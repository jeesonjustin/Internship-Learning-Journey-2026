let users = [];

const userContainer =
    document.getElementById('userContainer');

const message =
    document.getElementById("message");

const searchInput =
    document.getElementById("searchInput");


// Load data when page opens

window.onload = () => {
    fetchUsers();
};


// Fetch API

async function fetchUsers() {

    message.textContent = "Loading users...";

    try {

        const response =
            await fetch(
                "https://jsonplaceholder.typicode.com/users"
            );

        if (!response.ok) {
            throw new Error("Failed");
        }

        users = await response.json();

        message.textContent = "";

        displayUsers(users);

    }
    catch (error) {

        message.textContent =
            "Unable to load users. Please try again.";

    }
}


// Display Cards

function displayUsers(data) {

    userContainer.innerHTML = "";

    if (data.length === 0) {

        userContainer.innerHTML =
            "<h2>No users found</h2>";

        return;
    }

    data.forEach(user => {

        const card =
            document.createElement("div");

        card.classList.add("card");

        card.innerHTML = `
            <h3>${user.name}</h3>

            <p><b>Username:</b>
            ${user.username}</p>

            <p><b>Email:</b>
            ${user.email}</p>

            <p><b>Phone:</b>
            ${user.phone}</p>

            <p><b>Company:</b>
            ${user.company.name}</p>

            <p><b>Website:</b>
            ${user.website}</p>

            <button
                class="view-btn"
                onclick="showDetails(${user.id})">

                View Details

            </button>
        `;

        userContainer.appendChild(card);

    });

}


// Search

searchInput.addEventListener("input", () => {

    const searchText =
        searchInput.value.toLowerCase();

    const filteredUsers =
        users.filter(user =>

            user.name.toLowerCase().includes(searchText) ||
            user.username.toLowerCase().includes(searchText) ||
            user.email.toLowerCase().includes(searchText)

        );

    displayUsers(filteredUsers);

});


// View Details

function showDetails(id) {

    const user =
        users.find(user => user.id === id);

    document.getElementById("modalBody")
        .innerHTML = `

        <h2>${user.name}</h2>

        <p>
        <b>Address:</b>
        ${user.address.street}
        </p>

        <p>
        <b>City:</b>
        ${user.address.city}
        </p>

        <p>
        <b>Pin Code:</b>
        ${user.address.zipcode}
        </p>

    `;

    document.getElementById("modal").style.display = "flex";

}


// Close Modal

function closeModal() {

    document.getElementById("modal")
        .style.display = "none";

}

const themeBtn =
    document.getElementById("themeBtn");

themeBtn.addEventListener("click", () => {

    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {

        themeBtn.textContent = "Light Mode";

    } else {

        themeBtn.textContent = "Dark Mode";

    }

});

const viewBtn =
    document.getElementById("viewBtn");

viewBtn.addEventListener("click", () => {

    userContainer.classList.toggle("table-view");

    if (
        userContainer.classList.contains("table-view")
    ) {

        viewBtn.textContent = "Card View";

    }
    else {

        viewBtn.textContent = "Table View";

    }

});