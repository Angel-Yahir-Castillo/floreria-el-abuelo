if ('Notification' in window) {
    Notification.requestPermission().then(function (permission) {
      if (permission === 'granted') {
        console.log('Permission granted');
      }
    });
  }


function enviarNotificacion(){
    if(Notification.permission === 'granted'){
        console.log('hola');
        const notificacion = new Notification('Nuevo producto disponible',{
            icon: 'http://127.0.0.1:8000/img/hombre.png',
            body: 'Un hermoso ramo de flores',
        });

        notificacion.onclick = function(){
            window.open('http://127.0.0.1:8000/productos');
        }
    }
}