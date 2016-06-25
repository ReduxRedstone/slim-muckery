{% extends "templates/base.twig" %}

{% block content %}
	<div><h1>Hello {{ name }}.<br>Your UUID is {{ uuid }}.</h1></div>
	{{ uuid|getPlayerData }}
{% endblock %}