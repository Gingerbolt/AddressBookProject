<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Src.php";

    session_start();

    if(empty($_SESSION['list_of_contacts'])) {
    $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array("twig.path" => __DIR__."/../views"
    ));

    $app->get("/", function() use ($app) {
        return $app["twig"]->render("landing.html.twig");
    });

    $app->get("/home", function() use ($app) {
        return $app["twig"]->render("home.html.twig", array("contacts" => Contact::getAll()));
    });

    $app->post("/createContact", function() use ($app) {
        $contact = new Contact($_POST['name'], $_POST['phoneNumber'], $_POST['address']);
        $contact->save();
        return $app['twig']->render('createContact.html.twig', array('newcontact' => $contact));
    });

    $app->post("/deleteContacts", function() use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('deleteContacts.html.twig');
    });

return $app;

?>
