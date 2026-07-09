let students = JSON.parse(localStorage.getItem("students")) || [];
let editIndex = -1;

function showMessage(message, color = "green") {
    const msg = document.getElementById("message");
    msg.innerHTML = message;
    msg.style.color = color;

    setTimeout(() => {
        msg.innerHTML = "";
    }, 3000);
}

function setError(id, message) {
    document.getElementById(id).classList.add("error");
    document.getElementById(id).classList.remove("success");
    document.getElementById(id + "Error").innerHTML = message;
    return false;
}

function setSuccess(id) {
    document.getElementById(id).classList.remove("error");
    document.getElementById(id).classList.add("success");
    document.getElementById(id + "Error").innerHTML = "";
    return true;
}

function validateName() {
    let name = document.getElementById("name").value.trim();

    if (name === "") {
        return setError("name", "Name is required");
    }

    if (name.length < 3) {
        return setError("name", "Minimum 3 characters required");
    }

    return setSuccess("name");
}

function validateEmail() {
    let email = document.getElementById("email").value.trim();

    let pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (email === "") {
        return setError("email", "Email is required");
    }

    if (!pattern.test(email)) {
        return setError("email", "Invalid email format");
    }

    return setSuccess("email");
}

function validateMobile() {
    let mobile = document.getElementById("mobile").value.trim();

    let pattern = /^[6-9][0-9]{9}$/;

    if (mobile === "") {
        return setError("mobile", "Mobile number is required");
    }

    if (!pattern.test(mobile)) {
        return setError("mobile", "Enter valid 10 digit mobile number");
    }

    return setSuccess("mobile");
}

function validateDOB() {

    let dob = document.getElementById("dob").value;

    if (dob === "") {
        return setError("dob", "Please select Date of Birth");
    }

    let selectedDate = new Date(dob);
    let today = new Date();

    today.setHours(0, 0, 0, 0);

    if (selectedDate > today) {
        return setError("dob", "Future date is not allowed");
    }

    return setSuccess("dob");
}

function validateGender() {

    let gender = document.querySelector('input[name="gender"]:checked');

    if (!gender) {
        document.getElementById("genderError").innerHTML =
            "Please select gender";
        return false;
    }

    document.getElementById("genderError").innerHTML = "";
    return true;
}

function validateCourse() {

    let course = document.getElementById("course").value;

    if (course === "") {
        return setError("course", "Please select course");
    }

    return setSuccess("course");
}

function validateAddress() {

    let address =
        document.getElementById("address").value.trim();

    if (address === "") {
        return setError("address", "Address is required");
    }

    if (address.length < 10) {
        return setError(
            "address",
            "Address must contain at least 10 characters"
        );
    }

    return setSuccess("address");
}

function saveStudent() {

    let isValid = true;

    isValid = validateName() && isValid;
    isValid = validateEmail() && isValid;
    isValid = validateMobile() && isValid;
    isValid = validateDOB() && isValid;
    isValid = validateGender() && isValid;
    isValid = validateCourse() && isValid;
    isValid = validateAddress() && isValid;

    if (!isValid) {
        return false;
    }

    let student = {
        name: document.getElementById("name").value.trim(),
        email: document.getElementById("email").value.trim(),
        mobile: document.getElementById("mobile").value.trim(),
        dob: document.getElementById("dob").value,
        gender: document.querySelector(
            'input[name="gender"]:checked'
        ).value,
        course: document.getElementById("course").value,
        address: document.getElementById("address").value.trim()
    };

    if (editIndex >= 0) {

        if (!confirm(
            "Are you sure you want to update this record?"
        )) {
            return false;
        }

        students[editIndex] = student;

        showMessage(
            "Student Updated Successfully!"
        );

        editIndex = -1;

    } else {

        students.push(student);

        showMessage(
            "Student Added Successfully!"
        );
    }

    localStorage.setItem(
        "students",
        JSON.stringify(students)
    );

    renderTable();
    clearForm();

    return false;
}

function renderTable() {

    const tbody =
        document.getElementById("studentTable");

    const search =
        document.getElementById("searchInput")
            .value.toLowerCase();

    const courseFilter =
        document.getElementById("filterCourse")
            .value;

    tbody.innerHTML = "";

    let count = 0;

    students.forEach((student, index) => {

        const matchSearch =
            student.name.toLowerCase().includes(search) ||
            student.email.toLowerCase().includes(search) ||
            student.mobile.includes(search);

        const matchCourse =
            courseFilter === "" ||
            student.course === courseFilter;

        if (matchSearch && matchCourse) {

            count++;

            tbody.innerHTML += `
            <tr>
                <td>${count}</td>
                <td>${student.name}</td>
                <td>${student.email}</td>
                <td>${student.mobile}</td>
                <td>${student.course}</td>
                <td>
                    <button type="button"
                        class="action-btn edit-btn"
                        onclick="editStudent(${index})">
                        Edit
                    </button>

                    <button type="button"
                        class="action-btn delete-btn"
                        onclick="deleteStudent(${index})">
                        Delete
                    </button>
                </td>
            </tr>`;
        }
    });

    document.getElementById(
        "recordCount"
    ).innerHTML = count;
}

function editStudent(index) {

    const student = students[index];

    document.getElementById("name").value =
        student.name;

    document.getElementById("email").value =
        student.email;

    document.getElementById("mobile").value =
        student.mobile;

    document.getElementById("dob").value =
        student.dob;

    document.getElementById("course").value =
        student.course;

    document.getElementById("address").value =
        student.address;

    document.querySelectorAll(
        'input[name="gender"]'
    ).forEach(radio => {

        radio.checked =
            radio.value === student.gender;
    });

    editIndex = index;

    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

function deleteStudent(index) {

    if (
        !confirm(
            "Are you sure you want to delete this record?"
        )
    ) {
        return;
    }

    students.splice(index, 1);

    localStorage.setItem(
        "students",
        JSON.stringify(students)
    );

    renderTable();

    showMessage(
        "Student Deleted Successfully!",
        "red"
    );
}

function clearForm() {

    document.querySelector("form").reset();

    document.querySelectorAll(".error")
        .forEach(element => {
            element.classList.remove("error");
        });

    document.querySelectorAll(".success")
        .forEach(element => {
            element.classList.remove("success");
        });

    document.querySelectorAll(".error-message")
        .forEach(element => {
            element.innerHTML = "";
        });

    editIndex = -1;
}

document.getElementById("name")
    .addEventListener("blur", validateName);

document.getElementById("email")
    .addEventListener("blur", validateEmail);

document.getElementById("mobile")
    .addEventListener("blur", validateMobile);

document.getElementById("dob")
    .addEventListener("blur", validateDOB);

document.getElementById("course")
    .addEventListener("change", validateCourse);

document.getElementById("address")
    .addEventListener("blur", validateAddress);

document.querySelectorAll(
    'input[name="gender"]'
).forEach(radio => {

    radio.addEventListener(
        "change",
        validateGender
    );
});

renderTable();