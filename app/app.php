<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Src.php";

    session_start();

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array("twig.path" => __DIR__."/../views"

    $app->get("/", function() use ($app) {
        return $app["twig"]->render("home.html.twig", array("contacts" => Contact::getAll()));
    });
    $app->post("/places", function() use ($app) {
        $contact = new Contact($_POST['name'], $_POST['phone_number'], $_POST['address']);
        $contact->save();
        return $app['twig']->render('generate_place.html.twig', array('newcontact' => $contact));
    });
    $app->post("/delete_places", function() use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_contacts.html.twig');
    });
));

return $app;

?>
