document.addEventListener('DOMContentLoaded', function () {
    const elements = [
        { selector: '#skills', options: { create: true } },
        { selector: '#langs', options: { create: true } },
        { selector: '#specialty_name', options: { create: true } },
        { selector: '#job_info_name', options: { create: true } },
        { selector: '#university_name', options: { create: true } },
        { selector: '#state_id', options: { create: false } },
        { selector: '#district_id', options: { create: false } },
    ];

    elements.forEach(({ selector, options }) => {
        const element = document.querySelector(selector);
        if (element && !element.tomselect) {
            new TomSelect(selector, options);
        }
    });


    // Get the repeater list and add button
    const repeaterList = document.getElementById("repeater-list");
    const addButton = document.getElementById("add-repeater-item");

    // Index to keep track of items
    let index = 1;

    // Function to add a new repeater item
    addButton.addEventListener("click", () => {
        const newItem = document.createElement("div");
        newItem.classList.add("repeater-item", "mb-2");
        newItem.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" name="documents[${index}][document_name]" placeholder="Document Name" />
                    <input type="text" class="form-control" name="documents[${index}][document_type]" placeholder="Document type" />
                    <input type="file" class="form-control" name="documents[${index}][document_file]" />
                    <span class="input-group-append" id="basic-addon2">
                        <button class="btn btn-danger remove-item" type="button"><i class="fas fa-trash-alt"></i></button>
                    </span>
                </div>
            `;
        repeaterList.appendChild(newItem);
        index++;
    });

    // Function to remove a repeater item
    repeaterList.addEventListener("click", (event) => {
        if (event.target.closest(".remove-item")) {
            const item = event.target.closest(".repeater-item");
            repeaterList.removeChild(item);
        }
    });
});

var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: "Submit"
    },
    onStepChanging: function (event, currentIndex, newIndex) {
        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
    },
    onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    },
    onFinished: function (event, currentIndex) {
        swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
    }
}), $(".validation-wizard").validate({
    ignore: "input[type=hidden]",
    errorClass: "text-danger",
    successClass: "text-success",
    highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    },
    unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    },
    errorPlacement: function (error, element) {
        error.insertAfter(element)
    },
    rules: {
        email: {
            email: !0
        }
    }
})
