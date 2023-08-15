<?php
require_once('config.php');
require_once ROOT. '/vendor/autoload.php';
require_once ROOT. '/lib/extensions.php';

function get_object($id) {
    $json = file_get_contents(ROOT.'/data/'.$id.'.json');
    return json_decode($json);
}

function get_object_as_array($id) {
    return (array) get_object($id);
}

function widget($widget, $id) {
    $arr = get_object_as_array($id);
    $arr['id'] = $id;
    
    $loader = new \Twig\Loader\FilesystemLoader(ROOT.'/widgets');

    $twig = new \Twig\Environment($loader, [
        // 'cache' => ROOT.'/cache'
    ]);

    // $twig->addFunction(new Twig_SimpleFunction("hello_world", "hello_world"));
    $twig->addExtension(new simple_twig_extension());
    
    echo $twig->render('/'.$widget.'/template.html', $arr);
}
?>
