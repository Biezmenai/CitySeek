<!-- Create team Modal -->
<div id="join-team" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-8">
        <header class="w3-container w3-theme">
        <span onclick="document.getElementById('join-team').style.display='none';"
              class="w3-closebtn">&times;</span>
            <h2>Prisijunkite prie komandos</h2>
        </header>

        <div id="error-box" class="w3-panel w3-red w3-margin w3-center" style="display: none">
        </div>

        <div class="w3-container w3-margin">
            <form name="newTeam" class="w3-container w3-margin w3-center" action="{{ URL::to('/join-team') }}" method="POST" enctype="multipart/form-data">

                <label>Slaptas komandos kodas</label>
                <input class="w3-input w3-margin w3-center" maxlength="10" type="text" name="secret" id="secret">

                <button type="submit" class="w3-btn w3-green">Prisijungti</button>
            </form>
        </div>
    </div>
</div>