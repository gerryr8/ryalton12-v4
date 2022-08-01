function loadImage(url) {
    return new Promise(resolve => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = "blob";
        xhr.onload = function (e) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const res = event.target.result;
                resolve(res);
            }
            const file = this.response;
            reader.readAsDataURL(file);
        }
        xhr.send();
    });
}

let signaturePad = null;

window.addEventListener('load', async () => {

    const canvas = document.querySelector("canvas");
    canvas.height = canvas.offsetHeight;
    canvas.width = canvas.offsetWidth;

    signaturePad = new SignaturePad(canvas, {});

    const form = document.querySelector('#form');
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let departamento = document.getElementById('departamentos').value;
        let nombres = document.getElementById('nombre').value;
        let puestos = document.getElementById('puesto').value;
        let numerodealfitions = document.getElementById('numerodealfitrion').value;
        let newhotel = document.querySelector('input[name="newhotels"]:checked').value;
        let newpost = document.querySelector('input[name="newposts"]:checked').value;
        let newspa = document.querySelector('input[name="newspas"]:checked').value;
        let newchange = document.querySelector('input[name="newchanges"]:checked').value;
        let usuariopc = document.querySelector('input[name="usuarioremotos"]:checked').value;
        let correoelectronico  = document.querySelector('input[name="Correoelectronicos"]:checked').value;
        let internet = document.querySelector('input[name="internets"]:checked').value;
        let pindeimpresion = document.querySelector('input[name="pins"]:checked').value;
        let vision = document.querySelector('input[name="visions"]:checked').value;
        let asistencia = document.querySelector('input[name="asistencias"]:checked').value;
        let aplicativo = document.querySelector('input[name="aplicativos"]:checked').value;
        let zafiro = document.querySelector('input[name="zafiros"]:checked').value;
        let consola = document.querySelector('input[name="consolas"]:checked').value;

        generatePDF(departamento,
            nombres, puestos, numerodealfitions, newhotel, newpost, newspa, newchange, usuariopc, correoelectronico, internet
            ,pindeimpresion, vision, asistencia, aplicativo, zafiro, consola );
    })

});

async function generatePDF(departamento,
    nombres, puestos, numerodealfitions, newhotel, newpost, newspa, newchange, usuariopc, correoelectronico
    ,internet, pindeimpresion, vision, asistencia, aplicativo, zafiro, consola ) {
    
        const image = await loadImage("formulario.jpg");
    const signatureImage = signaturePad.toDataURL();

    const pdf = new jsPDF('px', 'pt', 'letter');

    pdf.addImage(image, 'PNG', 0, 0, 565, 792);
    pdf.addImage(signatureImage, 'PNG', 100, 550, 280, 90);

    pdf.setFontSize(10);
    pdf.text(departamento, 145, 472);

    const date = new Date();
    pdf.text(date.getUTCDate().toString(), 145, 517);
    pdf.text((date.getUTCMonth() + 1).toString(), 170, 517);
    pdf.text(date.getUTCFullYear().toString(), 190, 517);

    pdf.setFontSize(10);
    pdf.text(nombres, 145, 456);
    pdf.text(numerodealfitions, 145, 500);
    pdf.text(puestos, 145, 486);

    pdf.setFillColor(0,0,0);
    
    if (parseInt(newhotel) === 0) {
        pdf.circle(0, 0, 0, 'FD');
    } else {
        pdf.circle(204, 309, 4, 'FD');
    }

    if (parseInt(newpost) === 0) {
        pdf.circle(0, 0, 0, 'FD');
    } else {
        pdf.circle(204, 327, 4, 'FD');
    }

    if (parseInt(newspa) === 0) {
        pdf.circle(0, 0, 0, 'FD');
    } else {
        pdf.circle(204, 345, 4, 'FD');
    }

    if (parseInt(newchange) === 0) {
        pdf.circle(0, 0, 0, 'FD');
    } else {
        pdf.circle(204, 363, 4, 'FD');
    }

    if (parseInt(usuariopc) === 0) {
        pdf.circle(0, 0, 0, 'FD');
    } else {
        pdf.circle(345, 309, 4, 'FD');
    }


    if (parseInt(correoelectronico) === 0) {
        pdf.circle(0, 0, 0, 'FD');
    } else {
        pdf.circle(345, 327, 4, 'FD');
    }


    if (parseInt(internet) === 0) {
        pdf.circle(0, 0, 0, 'FD');
    } else {
        pdf.circle(345, 345, 4, 'FD');
    }


    if (parseInt(pindeimpresion) === 0) {
        pdf.circle(0, 0, 0, 'FD');
    } else {
        pdf.circle(345, 363, 4, 'FD');
    }


    if (parseInt(vision) === 0) {
        pdf.circle(0, 0, 0, 'FD');
    } else {
        pdf.circle(497, 309, 4, 'FD');
    }


    if (parseInt(aplicativo) === 0) {
        pdf.circle(0, 0, 0, 'FD');
    } else {
        pdf.circle(497, 327, 4, 'FD');
    }


    if (parseInt(asistencia) === 0) {
        pdf.circle(0, 0, 0, 'FD');
    } else {
        pdf.circle(497, 345, 4, 'FD');
    }

    if (parseInt(zafiro) === 0) {
        pdf.circle(0, 0, 0, 'FD');
    } else {
        pdf.circle(497, 363, 4, 'FD');
    }


    if (parseInt(consola) === 0) {
        pdf.circle(0, 0, 0, 'FD');
    } else {
        pdf.circle(497, 381, 4, 'FD');
    }




    pdf.save("Resguardo de aplicaciones.pdf");

}