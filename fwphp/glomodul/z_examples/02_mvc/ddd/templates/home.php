{% extends "base.html" %}

{% block title %}Home page{% endblock %}

{% block stylesheets %}
    {{parent()}}
    <link rel="stylesheet" href="../assets/home.css" />
{% endblock %}

{% block content %}
    <h1>Home page</h1>
    <p class="c-home__description">WELCOME !</p>
    <div class="c-home__ctn">
      <h3><a class="c-home__ctn-btn" href="<?=$pp1->gallery_images?>">Click to access to images</a></h3>
    </div>
{% endblock %}



<br /><br /><br />*************** gallery.php was :<br /><br />

{% extends "base.html" %}

{% block title %} Images list {{ parent() }}{% endblock %}

{% block stylesheets %}
    {{parent()}}
    <link rel="stylesheet" href="../assets/gallery.css" />
{% endblock %}

{% block content %}
    <h1> Images gallery</h1>
    <p class="c-gallery__description">Show images from endpoint:&nbsp; <b>https://picsum.photos/v2/list</b></p>
    <div class="c-gallery__image-ctn">
        {% for image in images_list %}
            <div class="c-gallery__image-ctn-item">
                <img src="{{image.download_url}}" alt="{{'image n°' ~ image.id}}" width="300px" height="300px">
            </div>
        {% endfor %}
    </div>
{% endblock %}