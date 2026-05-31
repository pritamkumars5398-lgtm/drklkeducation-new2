<?= $this->include('frontend/layout/header'); ?>

<?php
// Donors data is dynamically passed from Home::donors() as $donors
?>

<div class="container my-5 text-center">

    <!-- Title -->
    <div class="mb-3">
        <button class="btn title-btn">Donors</button>
    </div>

    <!-- Search -->
    <div class="mb-4">
        <input type="text" id="searchInput" class="form-control w-50 mx-auto" placeholder="Search donor..." onkeyup="filterDonors()">
    </div>

    <!-- Donor Grid -->
    <div class="row" id="donorsGrid">

        <?php if(!empty($donors)): ?>
            <?php foreach($donors as $donor): ?>
            <div class="col-md-3 mb-4 donor-card-col">

                <div class="donor-card">

                    <!-- Image -->
                    <div class="donor-img">
                        <?php $photoPath = (!empty($donor['photo']) && file_exists(FCPATH . $donor['photo'])) ? base_url($donor['photo']) : base_url('imgs/member/member-01.jpg'); ?>
                        <img src="<?= $photoPath ?>" alt="Donor">
                    </div>

                    <!-- Info -->
                    <div class="donor-info">
                        <h6 class="donor-name"><?= esc($donor['full_name']) ?></h6>
                        <p>₹ <?= number_format($donor['amount'], 2) ?></p>
                    </div>

                </div>

            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center mt-4">
                <p>No verified donors found.</p>
            </div>
        <?php endif; ?>

    </div>

</div>

<script>
function filterDonors() {
    let input = document.getElementById("searchInput");
    let filter = input.value.toLowerCase();
    let grid = document.getElementById("donorsGrid");
    let cards = grid.getElementsByClassName("donor-card-col");

    for (let i = 0; i < cards.length; i++) {
        let nameMatches = false;
        let h6 = cards[i].querySelector(".donor-name");
        
        if (h6) {
            let textValue = h6.textContent || h6.innerText;
            if (textValue.toLowerCase().indexOf(filter) > -1) {
                nameMatches = true;
            }
        }

        if (nameMatches) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}
</script>

<?= $this->include('frontend/layout/footer'); ?>