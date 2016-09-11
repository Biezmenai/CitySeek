<h1>Navigacija</h1>
<!-- Thumbnails -->
<section class="thumbnails">
    <div>
        <a href="/home">
            <img src="images/thumbs/home3.png" alt="" />
            <h3>Grįžti į pradinį puslapį</h3>
        </a>
        <a href="/kontaktai">
            <img src="images/thumbs/contact_us.png" alt="" />
            <h3>Susisiekite su mumis</h3>
        </a>
    </div>
    <div>
        <a href="/uzduotys">
            <img src="images/thumbs/tasks.png" alt="" />
            <h3>Vykdyti užduotis</h3>
        </a>
        <a href="/apie-mus">
            <img src="images/thumbs/about_us.png" alt="" />
            <h3>Apie mus</h3>
        </a>
    </div>
    <div>
        <a href="/informacija">
            <img src="images/thumbs/event.png" alt="" />
            <h3>Informacija apie renginį</h3>
        </a>
        <?php $a=Auth::user()->accesslevel;
        if ($a>0){ ?>
            <a href="/admin">
                <img src="images/thumbs/admin.png" alt="" />
                <h3>Admin Area</h3>
            </a>
        <?php }?>
    </div>
    <div>
        <a href="/listing">
            <img src="images/thumbs/listing.png" alt="" />
            <h3>Turnyrinė lentelė</h3>
        </a>
    </div>
</section>