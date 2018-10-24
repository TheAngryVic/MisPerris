from django.contrib import admin
from .models import Region,Provincia,Comuna,Raza,Estado,Usuario,Mascota
# Register your models here.

class UserAdmin(admin.ModelAdmin):
    list_display = ('nombre','apellido','fecha_nacimiento','telefono','comuna')
    search_fields= ['comuna','nombre','apellido','fecha_nacimiento','telefono']
    list_filter = ('comuna',)

class MascotaAdmin(admin.ModelAdmin): 
    list_display = ('nombreMascota','raza','genero','fecha_nacimientoMascota','imagen','estado')

admin.site.register(Region)
admin.site.register(Provincia)
admin.site.register(Comuna)
admin.site.register(Raza)
admin.site.register(Estado)
admin.site.register(Usuario,UserAdmin)
admin.site.register(Mascota,MascotaAdmin)


