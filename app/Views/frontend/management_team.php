<?= $this->include('frontend/layout/header'); ?>



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

        <?php if (!empty($team)): ?>
            <?php foreach($team as $member): ?>
            <div class="col-md-3 mb-4 team-card-col">
                <div class="member-card">

                    <div class="member-img">
                        <?php $photo = (!empty($member['photo']) && file_exists(FCPATH . $member['photo'])) ? base_url($member['photo']) : base_url('imgs/member/member-01.jpg'); ?>
                        <img src="<?= $photo ?>" alt="Manager Photo">
                    </div>

                    <div class="member-info">
                        <h6 class="member-name"><?= esc($member['name']) ?></h6>
                        <p class="member-role"><?= esc($member['designation']) ?>
                            <?php if(!empty($member['department'])): ?>
                            <br><small><?= esc($member['department']) ?></small>
                            <?php endif; ?>
                        </p>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center mt-4">
                <p>No team members found.</p>
            </div>
        <?php endif; ?>

    </div>

</div>

<script>
function filterTeam() {
    let input = document.getElementById("searchInput");
    let filter = input.value.toLowerCase();
    let grid = document.getElementById("teamGrid");
    let cards = grid.getElementsByClassName("team-card-col");

    for (let i = 0; i < cards.length; i++) {
        let nameMatches = false;
        let pMatches = false;
        
        let h6 = cards[i].querySelector(".member-name");
        let p = cards[i].querySelector(".member-role");
        
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
