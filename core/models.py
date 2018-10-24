from django.db import models

# Create your models here.

#class Marca(models.Model):
    #nombre = models.CharField(max_length=50)
    #descripcion = models.CharField(max_length=200)

    #def __str__(self):
        #return self.nombre

class Region(models.Model):
    descripcionRegion = models.CharField(max_length=90)

class Provincia(models.Model):
    descripcionProvincia = models.CharField(max_length=90)
    region = models.ForeignKey(Region,on_delete=models.CASCADE)

class Comuna(models.Model):
    descripcionComuna = models.CharField(max_length=90)
    provincia = models.ForeignKey(Provincia,on_delete=models.CASCADE)


class Raza(models.Model):
    descripcionRaza = models.CharField(max_length=20)

class Estado(models.Model):
    descripcion = models.CharField(max_length=20)

class Usuario(models.Model):
    correo = models.CharField(max_length=40)
    clave = models.CharField(max_length=25)
    rut = models.CharField(max_length=9, unique=True)
    nombre = models.CharField(max_length=20)
    apellido = models.CharField(max_length=20)
    fecha_nacimiento = models.DateField()
    telefono = models.CharField(max_length=8)
    comuna= models.ForeignKey(Comuna,on_delete=models.CASCADE)

    

class Mascota(models.Model):
    nombreMascota = models.CharField(max_length=20)
    raza = models.ForeignKey(Raza, on_delete=models.CASCADE)
    genero= models.BinaryField()
    fecha_nacimientoMascota= models.DateField()
    imagen= models.ImageField()
    estado = models.ForeignKey(Estado, on_delete=models.CASCADE)




    