<?php

function generate_lipsum() {
    echo 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi sint error autem neque veritatis quod doloremque impedit doloribus similique id eius nam delectus architecto cupiditate, sapiente magnam consequuntur est! Rerum.';
}

function hello_world($name) {
    echo $name.' says "Hello World!"';
}

function concat($x, $y) {
    return strtoupper($x.$y);
}

class simple_twig_extension extends \Twig\Extension\AbstractExtension {
    public function getFunctions() {
        return [
            new \Twig\TwigFunction('get_object', 'get_object_as_array'),
            new \Twig\TwigFunction('lipsum', 'generate_lipsum'),
            new \Twig\TwigFunction('hello_world', 'hello_world')
        ];
    }

    public function getFilters() {
        return [
            new \Twig\TwigFilter('concat', 'concat')
        ];
    }
}
?>