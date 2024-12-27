document.addEventListener('DOMContentLoaded', function () {
    const elements = [
        { selector: '#skills', options: { create: true } },
        { selector: '#langs', options: { create: true } },
        { selector: '#specialty_name', options: { create: true } },
        { selector: '#job_info_name', options: { create: true } },
        { selector: '#state_id', options: { create: false } },
        { selector: '#district_id', options: { create: false } },
    ];

    elements.forEach(({ selector, options }) => {
        const element = document.querySelector(selector);
        if (element && !element.tomselect) {
            new TomSelect(selector, options);
        }
    });
});
