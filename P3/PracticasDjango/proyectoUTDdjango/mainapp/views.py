from django.shortcuts import render
from django.shortcuts import redirect

# Create your views here.

def index(request):
    mensaje='¡Hola!'
    return render(request, 'mainapp/index.html', {
        'title':'Inicio',
        'content':'.::Bienvenido a la página de inicio!::.',
        'mensaje':mensaje
    })
    
def about(request):
    return render(request, 'mainapp/about.html', {
        'title':'Acerca de nosotros',
        'content':'Somos un equipo de desarrollo de SW'
    })
    
def mision(request):
    return render(request, 'mainapp/mision.html', {
        'title':'Mision',
        'content':'La misión de la empresa'
    })
    
def vision(request):
    return render(request, 'mainapp/vision.html', {
        'title':'Vision',
        'content':'La visión de la empresa'
    })

def page404(request, exception):
    return render(request, 'mainapp/404.html', status=404)