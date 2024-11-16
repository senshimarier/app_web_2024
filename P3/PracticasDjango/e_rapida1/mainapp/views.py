from django.shortcuts import render

# Create your views here.

def index(request):
    return render(request, 'mainapp/index.html', {
        'title':'Inicio',
        'content':'.::Bienvenido!::.',
    })
    
def about(request):
    return render(request, 'mainapp/about.html', {
        'title':'Acerca de nosotros',
        'content':'Somos un equipo dedicado al trabajo y atender a nuestros clientes.'
    })
    
def mision(request):
    return render(request, 'mainapp/mision.html', {
        'title':'Mision',
        'content':'Nuestra mision es atender nuestro público.'
    })
    
def vision(request):
    return render(request, 'mainapp/vision.html', {
        'title':'Vision',
        'content':'Nuestra vision es que nuestros clientes sientan la satisfacción con nuestra atención.'
    })
