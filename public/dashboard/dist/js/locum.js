document.addEventListener('DOMContentLoaded', function () {
    const elements = [
        { selector: '#skills', options: { create: true } },
        { selector: '#langs', options: { create: true } },
        { selector: '#specialty_name', options: { create: true } },
        { selector: '#job_info_name', options: { create: true } },
        { selector: '#state_id', options: { create: false } },
        { selector: '#district_id', options: { create: false } },
        { selector: '#university_id', options: { create: false } },
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
