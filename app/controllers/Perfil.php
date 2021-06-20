<?php
 
class Perfil extends Controller
{
    
    public function __construct()
    {
        $this->perfil = $this->model('perfilUsuario');
        $this->usuario = $this->model('usuario');
        $this->publicaciones = $this->model('publicar');
        $this->publicacionesperfil = $this->model('publicarperfil');
    }

    public function index($user)
    {
        if(isset($_SESSION['logueado'])) {

            $datosUsuario = $this->usuario->getUsuario($user);
            $datosPefil = $this->usuario->getPerfil($datosUsuario->idusuario);
            $misNotificaciones = $this->publicaciones->getNotificaciones($_SESSION['logueado']);
            $misMensajes = $this->publicaciones->getMensajes($_SESSION['logueado']);
            $datosPublicacionesperfil = $this->publicacionesperfil->getPublicacionesPerfil();

            $datos = [
                'perfil' => $datosPefil,
                'usuario' => $datosUsuario,
                'publicacionesperfil' => $datosPublicacionesperfil,
                 'misNoticaciones' => $misNotificaciones,
                'misMensajes' => $misMensajes
            ];

            $this->view('pages/perfil/perfil' , $datos);
        }
    }

        public function cambiarImagen()
    {

        $carpeta = 'C:/xampp/htdocs/redsocialtesh/public/img/imagenesPerfil/';
        opendir($carpeta);
        $rutaImagen = 'img/imagenesPerfil/' . $_FILES['imagen']['name']; 
        $ruta = $carpeta . $_FILES['imagen']['name'];
        copy($_FILES['imagen']['tmp_name'] , $ruta);

        $datos = [
        'idusuario' => trim($_POST['id_user']),
        'ruta' => $rutaImagen
        ];

        $imagenActual = $this->usuario->getPerfil($datos['idusuario']);
        
        unlink('C:/xampp/htdocs/redsocialtesh/public/' . $imagenActual->fotoPerfil);
 
         if($this->perfil->editarFoto($datos)) {
             redirection('/home');
         } else {
             echo 'El perfil no se ha guardado';
         }
    }
        public function cambiarImagenPortada()
    {

        $carpeta = 'C:/xampp/htdocs/redsocialtesh/public/img/imagenesPerfil/imagenes-portada-perfil/';
        opendir($carpeta);
        $rutaImagenPo = 'img/imagenesPerfil/imagenes-portada-perfil/' . $_FILES['imagen']['name']; 
        $rutaPo = $carpeta . $_FILES['imagen']['name'];
        copy($_FILES['imagen']['tmp_name'] , $rutaPo);

        $datos = [
        'idusuario' => trim($_POST['id_user']),
        'ruta' => $rutaImagenPo
        ];

        $imagenActual = $this->usuario->getPerfil($datos['idusuario']);
        
        unlink('C:/xampp/htdocs/redsocialtesh/public/' . $imagenActual->fotoPortada);
 
         if($this->perfil->editarFotoPortada($datos)) {
             redirection('/home');
         } else {
             echo 'El perfil no se ha guardado';
         }
    }

}