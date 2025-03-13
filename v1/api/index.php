<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\UploadedFile;

require '../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
      'displayErrorDetails' => true
    ]
      ]);

$container = $app->getContainer();
$container['upload_directory'] = __DIR__ . '/uploads';


//ADD USER
$app->post('/add/user', function($request) {

    require_once('dbconnect.php');

    $token = bin2hex(random_bytes(16));

    $query = "INSERT INTO user (usuario, pass, token) VALUES (?, ?, '$token')";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("ss", $usuario, $pass);

    $usuario = $request->getParsedBody()['usuario'];
    $pass = PASSWORD_HASH($request->getParsedBody()['pass'], PASSWORD_DEFAULT);

    $stmt->execute();
});


//Login
$app->post('/login', function(Request $request) {

    require_once('dbconnect.php');
    

    $query = "SELECT id, pass, token FROM user WHERE usuario = ?";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("s", $usuario);

    $usuario = $request->getParsedBody()['usuario'];
    $pass = $request->getParsedBody()['pass'];

    $stmt->execute();
 
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();

    if (password_verify($pass, $row['pass'])) {
        $token = $row['token'];
        if (isset($token)) {
            header('Content-Type; application/json');
            echo json_encode($token, JSON_UNESCAPED_UNICODE);
        }
    }
});


//ADD ITEM
$app->post('/add', function(Request $request, Response $response, $args) use ($app) {

    $uploadedFiles = $request->getUploadedFiles();
    $listFile = array();

    // handle multiple inputs with the same key
    foreach ($uploadedFiles['file'] as $uploadedFile) {
        if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
            $filename = moveUploadedFile($directory, $uploadedFile);
            $response->write('uploaded ' . $filename . '<br/>');
            array_push($listFile, $filename);
        }
    }
            $img = $listFile['0'];
            $pdf = $listFile['1'];

        require_once('dbconnect.php');

        $sku = rand(1,10000);
    
        $query = "INSERT INTO items (sku, tipo, precio, ubicacion, direccion, youtube, categoria, subcategoria, iconA, iconB, iconC, infoA, infoB, infoC, tags, imagen, pdf) VALUES ($sku, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '$img', '$pdf')";
    
        $stmt = $mysqli->prepare($query);
    
        $stmt->bind_param("sissssssssssss", $tipo, $precio, $ubicacion, $direccion, $youtube, $categoria, $subcategoria, $iconA, $iconB, $iconC, $infoA, $infoB, $infoC, $tags);

        $tipo = $request->getParsedBody()['tipo'];
        $precio = $request->getParsedBody()['precio'];
        $ubicacion = $request->getParsedBody()['ubicacion'];
        $direccion = $request->getParsedBody()['direccion'];
        $youtube = $request->getParsedBody()['youtube'];
        $categoria = $request->getParsedBody()['categoria'];
        $subcategoria = $request->getParsedBody()['subcategoria'];
        $iconA = $request->getParsedBody()['iconA'];
        $iconB = $request->getParsedBody()['iconB'];
        $iconC = $request->getParsedBody()['iconC'];
        $infoA = $request->getParsedBody()['infoA'];
        $infoB = $request->getParsedBody()['infoB'];
        $infoC = $request->getParsedBody()['infoC'];
        $tags = $request->getParsedBody()['tags'];
    
        $stmt->execute();

});

function moveUploadedFile($directory, UploadedFile $uploadedFile)
{
    $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
    $filename = sprintf('%s.%0.8s', $basename, $extension);

    $uploadedFile->moveTo('/home/u242213604/domains/capitalflowconsulting.com/public_html/uploads/'.$filename);

    return $filename;
}

$app->get('/user/{token}', function($request) {

    require_once('dbconnect.php');

    $token = $request->getAttribute('token');

    $query = "select id, token from user where token = '$token'";
    $result = $mysqli->query($query);

    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    if (isset($data)) {
        header('Content-Type; application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

});


//SHOW ITEMS.
$app->get('/items', function() {

    require_once('dbconnect.php');

    $query = "select * from items";
    $result = $mysqli->query($query);

    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    if (isset($data)) {
        header('Content-Type; application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

});


//DELETE ITEMS
$app->delete('/items/{id}', function($request){

    require_once('dbconnect.php');

    $id = $request->getAttribute('id');

    $query = "DELETE from items WHERE id = $id";

    $result = $mysqli->query($query);
   });


   //UPDATE ITEMS.
$app->put('/update/{id}', function($request) {

    require_once('dbconnect.php');

    $id = $request->getAttribute('id');

    $query = "UPDATE items SET tipo = ?, precio = ?, ubicacion = ?, direccion = ?, youtube = ?, categoria = ?, subcategoria = ?, iconA = ?, iconB = ?, iconC = ?, infoA = ? , infoB = ?, infoC = ?, tags = ? WHERE id = $id";

    $stmt = $mysqli->prepare($query);

    $stmt->bind_param("sissssssssssss", $tipo, $precio, $ubicacion, $direccion, $youtube, $categoria, $subcategoria, $iconA, $iconB, $iconC, $infoA, $infoB, $infoC, $tags);
    
    $tipo = $request->getParsedBody()['tipo'];
    $precio = $request->getParsedBody()['precio'];
    $ubicacion = $request->getParsedBody()['ubicacion'];
    $direccion = $request->getParsedBody()['direccion'];
    $youtube = $request->getParsedBody()['youtube'];
    $categoria = $request->getParsedBody()['categoria'];
    $subcategoria = $request->getParsedBody()['subcategoria'];
    $iconA = $request->getParsedBody()['iconA'];
    $iconB = $request->getParsedBody()['iconB'];
    $iconC = $request->getParsedBody()['iconC'];
    $infoA = $request->getParsedBody()['infoA'];
    $infoB = $request->getParsedBody()['infoB'];
    $infoC = $request->getParsedBody()['infoC'];
    $tags = $request->getParsedBody()['tags'];

    $stmt->execute();
});


//UPDATES PDF IMAGE ITEM
$app->post('/update/files/{id}', function(Request $request, Response $response, $args) use ($app) {

    $uploadedFiles = $request->getUploadedFiles();
    $listFile = array();

    // handle multiple inputs with the same key
    foreach ($uploadedFiles['file'] as $uploadedFile) {
        if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
            $filename = moveUploadedFile($directory, $uploadedFile);
            $response->write('uploaded ' . $filename . '<br/>');
            array_push($listFile, $filename);
        }
    }
            $img = $listFile['0'];
            $pdf = $listFile['1'];

            echo json_encode($listFile, JSON_UNESCAPED_UNICODE);

        require_once('dbconnect.php');

        $id = $request->getAttribute('id');
    
        $query = "UPDATE items SET imagen = '$img', pdf = '$pdf' WHERE id = $id";
    
        $stmt = $mysqli->prepare($query);
     
        $stmt->execute();

});

$app->get('/item/inversiones', function($request) {

    require_once('dbconnect.php');

    $query = "select * from items where categoria = 'Inversiones'";
    $result = $mysqli->query($query);

    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    if (isset($data)) {
        header('Content-Type; application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

});

$app->get('/item/inmuebles', function($request) {

    require_once('dbconnect.php');

    $query = "select * from items where categoria = 'Inmuebles'";
    $result = $mysqli->query($query);

    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    if (isset($data)) {
        header('Content-Type; application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

});

$app->run();