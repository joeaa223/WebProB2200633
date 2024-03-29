const uploadForm = document.getElementById("uploadForm");
const TitleInput = document.getElementById("Title");
const DescriptionInput = document.getElementById("Description");
const TalkPointsInput = document.getElementById("TalkPoints");
const ExtraInput = document.getElementById("Extra");
const contentTypeSelect = document.getElementById("Content_type");
const message = document.getElementById("message");

// Function to validate form fields
function validateForm() {
    let isValid = true;

    // Title validation
    if (TitleInput.value.trim() === "") {
        isValid = false;
        TitleInput.classList.add("is-invalid");
    } else {
        TitleInput.classList.remove("is-invalid");
    }

    // Description validation
    if (DescriptionInput.value.trim() === "") {
        isValid = false;
        DescriptionInput.classList.add("is-invalid");
    } else {
        DescriptionInput.classList.remove("is-invalid");
    }

    // Talking Points validation
    if (TalkPointsInput.value.trim() === "") {
        isValid = false;
        TalkPointsInput.classList.add("is-invalid");
    } else {
        TalkPointsInput.classList.remove("is-invalid");
    }

    // Extra Facts validation
    if (ExtraInput.value.trim() === "") {
        isValid = false;
        ExtraInput.classList.add("is-invalid");
    } else {
        ExtraInput.classList.remove("is-invalid");
    }

    // Content Type validation
    if (contentTypeSelect.value === "") {
        isValid = false;
        contentTypeSelect.classList.add("is-invalid");
    } else {
        contentTypeSelect.classList.remove("is-invalid");
    }

    return isValid;
}

// Event listener for form submission
uploadContent.addEventListener("submit", function (event) {
    if (!validateForm()) {
        // Prevent form submission if validation fails
    }
});

// Event listener to remove validation styles on input
TitleInput.addEventListener("input", function () {
    TitleInput.classList.remove("is-invalid");
});

DescriptionInput.addEventListener("input", function () {
    DescriptionInput.classList.remove("is-invalid");
});

TalkPointsInput.addEventListener("input", function () {
    TalkPointsInput.classList.remove("is-invalid");
});

ExtraInput.addEventListener("input", function () {
    ExtraInput.classList.remove("is-invalid");
});

contentTypeSelect.addEventListener("change", function () {
    contentTypeSelect.classList.remove("is-invalid");
});
