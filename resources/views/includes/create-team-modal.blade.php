<!-- Create team Modal -->
<div id="create-team" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-8">
        <header class="w3-container w3-theme">
        <span onclick="document.getElementById('create-team').style.display='none';
                       document.getElementById('error-box').innerHTML = '';
                       document.getElementById('error-box').style.display = 'none';"
              class="w3-closebtn">&times;</span>
            <h2>Sukurkite naują komandą</h2>
        </header>

        <div id="error-box" class="w3-panel w3-red w3-margin w3-center" style="display: none">
        </div>

        <div class="w3-container w3-margin">
            <form name="newTeam" class="w3-container w3-margin" action="{{ URL::to('/create-team') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

                <label>Komandos pavadinimas</label>
                <input class="w3-input w3-margin" type="text" name="name" id="name">

                <label>Nuotrauka/logotipas</label> (Nedidesnė nei 10MB dydžio, bei 200x200px rezoliucijos)
                <div class="image-upload w3-margin-bottom">
                    <label title="Pasirinkti nuotrauką" onmouseover="style='cursor:pointer'" for="img">
                        <img src="/images/thumbs/default-team.png"/>
                    </label>
                    <input onchange="style='display: block;'" type="file" name="img" id="img"/>
                </div>

                <button type="submit" class="w3-btn w3-green">Sukurti</button>
            </form>
        </div>
    </div>
</div>
<style>
    .image-upload > input
    {
        display: none;
    }
</style>
<script>
    function validateForm() {
        var errorBox = document.getElementById("error-box");
        errorBox.innerHTML = "";
        var x = document.forms["newTeam"]["name"].value;
        if (x == null || x == "") {
            errorBox.style.display = "block";
            errorBox.innerHTML = errorBox.innerHTML + '<p>Turite įvesti komandos pavadinimą</p>';
            return false;
        } else if (x.length < 3 || x.length > 100) {
            errorBox.style.display = "block";
            errorBox.innerHTML = errorBox.innerHTML + '<p>Komandos pavadinimas turi sudaryti ne mažiau nei 3 simbolius</p>';
            return false;
        }
    }
</script>