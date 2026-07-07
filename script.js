
// ================================
// Proposal Form Validation
// ================================

const proposalForm = document.getElementById("proposalForm");

if (proposalForm) {

    proposalForm.addEventListener("submit", function (e) {

        e.preventDefault();

        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let phone = document.getElementById("phone").value.trim();
        let budget = document.getElementById("budget").value.trim();
        let proposal = document.getElementById("proposal").value.trim();

        if (
            name === "" ||
            email === "" ||
            phone === "" ||
            budget === "" ||
            proposal === ""
        ) {
            alert("Please fill all fields.");
            return;
        }

        if (phone.length != 10) {
            alert("Phone number must be 10 digits.");
            return;
        }

        alert("Proposal Submitted Successfully!");

        proposalForm.reset();

    });

}



// ================================
// Project Search
// ================================

const searchBox = document.getElementById("searchProject");

if (searchBox) {

    searchBox.addEventListener("keyup", function () {

        let value = searchBox.value.toLowerCase();

        let cards = document.querySelectorAll(".project-card");

        cards.forEach(function (card) {

            let title = card.querySelector("h3").innerText.toLowerCase();

            if (title.includes(value)) {

                card.style.display = "block";

            } else {

                card.style.display = "none";

            }

        });

    });

}



// ================================
// Category Filter
// ================================

const categoryFilter = document.getElementById("categoryFilter");

if (categoryFilter) {

    categoryFilter.addEventListener("change", function () {

        let value = categoryFilter.value;

        let cards = document.querySelectorAll(".project-card");

        cards.forEach(function (card) {

            let category = card.dataset.category;

            if (value == "All" || value == category) {

                card.style.display = "block";

            } else {

                card.style.display = "none";

            }

        });

    });

}



// ================================
// Budget Filter
// ================================

const budgetFilter = document.getElementById("budgetFilter");

if (budgetFilter) {

    budgetFilter.addEventListener("change", function () {

        let value = budgetFilter.value;

        let cards = document.querySelectorAll(".project-card");

        cards.forEach(function (card) {

            let budget = Number(card.dataset.budget);

            let show = false;

            if (value == "All")
                show = true;

            else if (value == "10000" && budget <= 10000)
                show = true;

            else if (value == "20000" && budget > 10000 && budget <= 20000)
                show = true;

            else if (value == "30000" && budget > 20000)
                show = true;

            card.style.display = show ? "block" : "none";

        });

    });

}