<?= $this->include('frontend/layout/header'); ?>

<?php
$teamDummyData = [
    ['name' => 'श्री मनोज कुमार वर्मा', 'designation' => 'मीडिया प्रभारी', 'img' => 'member-01.jpg'],
    ['name' => 'श्री सत्यनारायण सांडे', 'designation' => 'संरक्षण सदस्य', 'img' => 'member-01.jpg'],
    ['name' => 'श्री अखिलेश जायसवाल', 'designation' => 'संरक्षण सदस्य', 'img' => 'member-01.jpg'],
    ['name' => 'श्री संजय कुमार बरेठ', 'designation' => 'संरक्षण सदस्य', 'img' => 'member-01.jpg'],
    ['name' => 'केशर चन्द महंत', 'designation' => 'दुर्ग संभाग प्रभारी', 'img' => 'member-01.jpg'],
    ['name' => 'प्रदीप साहू', 'designation' => 'बिलासपुर संभाग प्रभारी', 'img' => 'member-01.jpg'],
    ['name' => 'यू के पटेल', 'designation' => 'संरक्षण सदस्य', 'img' => 'member-01.jpg'],
    ['name' => 'खेमन जायसवाल', 'designation' => 'सरगुजा संभाग प्रभारी', 'img' => 'member-01.jpg'],
];
?>

<div class="container my-5 text-center">

    <!-- Title -->
    <div class="mb-3">
        <button class="btn title-btn">Management Team</button>
    </div>

    <!-- Search -->
    <div class="mb-4">
        <input type="text" id="searchInput" class="form-control search-box mx-auto" placeholder="Search Here" onkeyup="filterTeam()">
    </div>

    <!-- Team Grid -->
    <div class="row" id="teamGrid">

        <!-- Card -->
        <?php foreach($teamDummyData as $member): ?>
        <div class="col-md-3 mb-4 team-member-card">
            <div class="team-card">

                <div class="team-img">
                    <img src="<?= base_url('imgs/member/'.$member['img']) ?>" alt="Member Photo">
                </div>

                <div class="team-info">
                    <h6 class="member-name"><?= esc($member['name']) ?></h6>
                    <p class="member-designation"><?= esc($member['designation']) ?></p>
                </div>

            </div>
        </div>
        <?php endforeach; ?>

    </div>

</div>

<script>
function filterTeam() {
    let input = document.getElementById("searchInput");
    let filter = input.value.toLowerCase();
    let grid = document.getElementById("teamGrid");
    let cards = grid.getElementsByClassName("team-member-card");

    for (let i = 0; i < cards.length; i++) {
        let nameMatches = false;
        let pMatches = false;
        
        let h6 = cards[i].querySelector(".member-name");
        let p = cards[i].querySelector(".member-designation");
        
        if (h6) {
            let textValue = h6.textContent || h6.innerText;
            if (textValue.toLowerCase().indexOf(filter) > -1) nameMatches = true;
        }
        if (p) {
            let textValue = p.textContent || p.innerText;
            if (textValue.toLowerCase().indexOf(filter) > -1) pMatches = true;
        }

        if (nameMatches || pMatches) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}
</script>

<?= $this->include('frontend/layout/footer'); ?>