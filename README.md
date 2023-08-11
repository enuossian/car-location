# car-location
site pour récuperer bootswatch : cdnjs 

!recherche : Restrict contraintes de clé étrangère - contrainte d'intégrité

fixtures : envoyer des données fictives

Une entité porte tjrs une majuscule

Pour créer un user : php bin/console make:user 

Security - Login 

-> faire une condition pour filter l'accès à la partie admin (ajout, gestion)
Cpdt, on peut tjrs y accéder depuis l'url en tapant directement la route. 
Pour cela il faut aller dans security.yaml (config/packages).
Access control: - { path: ^/admin, roles: ROLE_ADMIN }
Si la route commence pas /admin il faut avoir le r$ole d'admin
access_denied_url : quelle route afficher dans l'url si l'utilisateur arrive sur une route non autorisée. 
Role_hierarchy : pour hierachiser les rôles

 role_hierarchy:
        ROLE_ADMIN: ROLE_USER

    # Easy way to control access for large sections of your site
    # Note: Only the *first* access control that matches will be used
    access_control:
        - { path: ^/admin, roles: ROLE_ADMIN }
        # - { path: ^/profile, roles: ROLE_USER }
    access_denied_url: /

Modifier une entité pour ajouter des champs: 
php bin/console make:entity User

Lien scalingo:
tk-us-IOCEEmxkgOHigx_iiFuCAx_YScoUe17AlB7ZA9Xph6XhiTAa
ctrlc pour terminer la commande d'un terminal 
scalingo apps

scalingo --app entreprise-employes-db mysql-console

 #[Route('/admin/add', name:'add_car')]
    public function form(Request $request, EntityManagerInterface $manager): Response
    {

        $form = $this->createForm(VoitureType::class, $car);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) 
        {
            $manager->persist($car);
            $manager->flush();
            return $this->redirectToRoute('app_admin');
        }

        return $this->render('admin/car/form.html.twig')
    }

{% extends 'base.html.twig' %}

{% block title %}Register{% endblock %}

{% block body %}
<div class="container mx-auto w-50 border border-primary rounded mt-3 p-4">
    <h1 class="text-center my-3">Inscription</h1>

    {{ form_errors(registrationForm) }}

    {{ form_start(registrationForm, {
        attr : { 
            novalidate: 'novalidate' 
        }
    }) }}
        <div class="row"> 
            <div class="col-6">{{ form_row(registrationForm.lastname, {
                label: "Nom"
            }) }}</div>
            <div class="col-6">{{ form_row(registrationForm.firstname, {
                label: "Prénom"
            }) }}</div>
            <div class="col-6">{{ form_row(registrationForm.email, {
                label: "Email"
            }) }}</div>
            <div class="col-6"> {{ form_row(registrationForm.plainPassword, {
                label: "Password"
            }) }}</div>
            <div class="col-6"> {{ form_row(registrationForm.city, {
                label: "Ville"
            }) }}</div>
        </div>
        {{ form_row(registrationForm.agreeTerms) }}

        <button type="submit" class="btn">Register</button>
    {{ form_end(registrationForm) }}
</div>
{% endblock %}
