<?= $this->include('frontend/layout/header'); ?>



<div class="container my-5 text-center">

    <!-- Title -->
    <div class="mb-3">
        <button class="btn title-btn">Our Members</button>
    </div>

    <!-- Search -->
    <div class="mb-4">
        <input type="text" id="searchInput" class="form-control search-box mx-auto" placeholder="Search Here" onkeyup="filterMembers()">
    </div>

    <!-- Members Grid -->
    <div class="row" id="membersGrid">

        <?php if (!empty($members)): ?>
            <?php foreach($members as $member): ?>
            <div class="col-md-3 mb-4 members-card-col">
                <div class="member-card">

                    <div class="member-img">
                        <?php $photo = (!empty($member['photo']) && file_exists(FCPATH . $member['photo'])) ? base_url($member['photo']) : base_url('imgs/member/member-01.jpg'); ?>
                        <img src="<?= $photo ?>" alt="Member Photo">
                    </div>

                    <div class="member-info">
                        <h6 class="member-name"><?= esc($member['full_name']) ?></h6>
                        <p class="member-role"><?= esc($member['occupation'] ?? 'Member') ?>
                            <?php if(!empty($member['city'])): ?>
                            <br><small><?= esc($member['city']) ?> (<?= esc($member['state'] ?? '') ?>)</small>
                            <?php endif; ?>
                        </p>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center mt-4">
                <p>No members found.</p>
            </div>
        <?php endif; ?>

    </div>

</div>

<script>
function filterMembers() {
    let input = document.getElementById("searchInput");
    let filter = input.value.toLowerCase();
    let grid = document.getElementById("membersGrid");
    let cards = grid.getElementsByClassName("members-card-col");

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