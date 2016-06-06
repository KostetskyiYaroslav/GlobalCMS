interact('.draggable')
    .draggable({
        inertia: true,
        /*
        // keep the element within the area of it's parent
        restrict: {
            restriction: "parent",
            endOnly: true,
            elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
        },*/
        // enable autoScroll
        autoScroll: true,
        onmove: dragMoveListener,
        onend: function (event) {
            //TODO: Add jquery ajax func to add widget async
        }
    });

function dragMoveListener (event) {
    var target = event.target,
        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
        y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;
    target.style.zIndex = 1;
    target.style.webkitTransform =
        target.style.transform =
            'translate(' + x + 'px, ' + y + 'px)';

    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);
}

window.dragMoveListener = dragMoveListener;

interact('.dropzone').dropzone({
    accept: '#widget',
    overlap: 0.75,

    ondropactivate: function (event) {
        event.target.classList.add('drop-active');
    },
    ondragenter: function (event) {
        var draggableElement = event.relatedTarget,
            dropzoneElement = event.target;

        dropzoneElement.classList.add('drop-target');
        draggableElement.classList.add('can-drop');

        //draggableElement.textContent = 'Dragged in';
    },
    ondragleave: function (event) {
        event.target.classList.remove('drop-target');
        event.relatedTarget.classList.remove('can-drop');
        //event.relatedTarget.textContent = 'Dragged out';
         var draggableElement = event.relatedTarget;
        console.log('out');
        var widget_id = $(draggableElement).attr('title');

        $.ajax({
            url: "/settings/widgets_delete",
            method: "POST",
            data: { 'widget_id' : widget_id },
            dataType: "html",
            success: function(response) {
                console.log(response.toString());
            }
        });
    },
    ondrop: function (event) {
        var draggableElement = event.relatedTarget,
            dropzoneElement = event.target;

        var widget_name = $(draggableElement).attr('title');
        var widget_position = $(dropzoneElement).attr('title');

        $.ajax({
            url: "/settings/widgets_save",
            method: "POST",
            data: { 'widget_name' : widget_name, 'widget_position' : widget_position},
            dataType: "html",
            success: function(response) {
                console.log(response.toString());
            }
        });
        //event.relatedTarget.textContent = 'Dropped';
    },
    ondropdeactivate: function (event) {
        event.target.classList.remove('drop-active');
        event.target.classList.remove('drop-target');
        console.log('ondropdeactivate');
    }
});

