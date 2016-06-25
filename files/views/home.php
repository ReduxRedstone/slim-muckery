{% extends "templates/base.twig" %}

{% block content %}
Home
{{ "strign 1"|test("string 2", "sad") }}
{% endblock %}