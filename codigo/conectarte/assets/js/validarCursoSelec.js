const caja = document.getElementById('curso_check');

/*
for (let i = 0; i < checked.value; i++) {
    console.log(i);
}
*/


caja.addEventListener('click', () => {
    console.dir(caja.parentNode);
    caja.id += 10;
    if (caja.value === 2) {
        console.log('Seleccionado');
    } 
        
    
})