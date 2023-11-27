var mytextlayer = null;

// assumes pdfjs v 2.16.105
function init_pdf_viewer(containerId, pdfUrl) {

    // Reference to the PDF container
    var pdfContainer = document.getElementById(containerId);

    // Asynchronous download PDF
    pdfjsLib.getDocument(pdfUrl).promise.then(function (pdfDoc) {
        // Loop through all pages
        for (let pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
            (function (pageNum) {
                // console.log("page", pageNum);
                pdfDoc.getPage(pageNum).then(function (page) {

                    // Calculate the scale factor based on the device's pixel ratio,
                    // add factor 2 for e.g. zoom on mobile
                    var scale = window.devicePixelRatio || 1;
                    scale *= 1.2;
                    // do not overdo it here! otherwise it might not render at all
                    // https://github.com/wojtekmaj/react-pdf/issues/1149

                    // Create a container for the page
                    // var pageContainer = document.createElement('div');
                    // pageContainer.classList.add('pageContainer');
                    // pageContainer.id = 'pageContainer-' + pageNum;
                    // pdfContainer.appendChild(pageContainer);

                    // instead, we use the precreated ones (since we know the number
                    // of pages and want to avoid dom insertion flicker)
                    var pageContainer = document.getElementById('pageContainer-' + pageNum);


                    // Create the canvas and append it to the page container
                    var canvas = document.createElement('canvas');
                    pageContainer.appendChild(canvas);

                    // Set canvas size to fill the container
                    var viewport = page.getViewport({ scale: scale });
                    canvas.width = viewport.width;
                    canvas.height = viewport.height;

                    // I could not figure out the text stuff in reasonable time.
                    // Create a text layer div
                    // var textLayerDiv = document.createElement('div');
                    // textLayerDiv.className = 'textLayer';
                    // textLayerDiv.id = 'textLayer-' + pageNum;
                    // textLayerDiv.style.width = viewport.width + 'px';
                    // textLayerDiv.style.height = viewport.height + 'px';
                    // textLayerDiv.style.width = viewport.width / scale + 'px';
                    // textLayerDiv.style.height = viewport.height / scale + 'px';

                    // if (pageNum == 1) {
                    //     textLayerDiv.style.background = 'rgba(0,255,0,0.5)';
                    // } else {
                    //     textLayerDiv.style.background = 'rgba(255,0,0,0.5)';
                    // }
                    // pageContainer.appendChild(textLayerDiv);

                    // Render the PDF page on the canvas
                    var renderContext = {
                        canvasContext: canvas.getContext('2d'),
                        viewport: viewport
                    };

                    var renderTask = page.render(renderContext);

                    // once rendering is finished, remove the class to update css style
                    renderTask.promise.then(function () {
                        document.getElementById('pageContainer-' + pageNum).classList.add('finished-rendering');
                    }).catch(function (reason) {
                        console.error('Error: ' + reason);
                    });

                    // Create the text layer builder
                    // var textLayer = new pdfjsViewer.TextLayerBuilder({
                    //     textLayerDiv: textLayerDiv,
                    //     pageIndex: pageNum - 1,
                    //     viewport: viewport,
                    // });
                    // mytextlayer = textLayer;

                    // // Render the text layer
                    // page.getTextContent().then(function (textContent) {
                    //     textLayer.setTextContent(textContent);
                    //     textLayer.render();
                    // });
                });
            }) (pageNum);
        }
    });
}


