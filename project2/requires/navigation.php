<div class="header">
    <a class="bold slab-serif black big link section" href="index.php">SongSung</a>

    <div class="sections">
        <a class="sans-serif gray small link section" href="search.php?title=&amp;singer=&amp;category=pop&amp;ratings=&amp;comments=&amp;submit=Submit">Pop</a>
        <a class="sans-serif gray small link section" href="search.php?title=&amp;singer=&amp;category=rock&amp;ratings=&amp;comments=&amp;submit=Submit">Rock</a>
        <a class="sans-serif gray small link section" href="search.php?title=&amp;singer=&amp;category=country&amp;ratings=&amp;comments=&amp;submit=Submit">Country</a>
        <a class="sans-serif gray small link section" href="search.php?title=&amp;singer=&amp;category=blues&amp;ratings=&amp;comments=&amp;submit=Submit">Blues</a>
        <a class="sans-serif gray small link section" href="search.php?title=&amp;singer=&amp;category=rapping&amp;ratings=&amp;comments=&amp;submit=Submit">Rapping</a>
        <a class="sans-serif gray small link section" href="search.php?title=&amp;singer=&amp;category=classical&amp;ratings=&amp;comments=&amp;submit=Submit">Classical</a>
    </div>

    <a class="slab-serif link right section" href="#" id="search">Search</a>
    <a class="sans-serif link right section" href="write.php">Write your reviews</a>

</div>

<div class="hidden">

    <form class="search" action="search.php" method="get">


        <!-- Toggle this when .option is clicked. See main.js -->
        <div class="advanced">
            <input class="input" type="text" name="title" placeholder="Title">
            <input class="input" type="text" name="singer" placeholder="Singer">
            <select class="input" name="category">
                <option value="&amp;" >Category</option>
                <option value="Pop" >Pop</option>
                <option value="Rock" >Rock</option>
                <option value="Country" >Country</option>
                <option value="Blues" >Blues</option>
                <option value="Rapping" >Rapping</option>
                <option value="Classical" >Classical</option>
            </select>
            <input class="input" type="text" name="ratings" placeholder="Ratings (star 1-5)">
            <input class="input" type="text" name="comments" placeholder="Comments">
            <input class="input submit" name="submit" type="submit" value="Search">
        </div>


    </form>

</div>