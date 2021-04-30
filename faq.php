<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ || Coms</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="box-area">
    <?php include('header.php'); ?>
        <div class="banner">
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="content-area">
            <div class="wrapper">
            <button class="accordion">What are the requirements for admitting a child in your Orphanage Center?</button>
                <div class="panel">
                    <p>
                    the child is a complete orphan or a half-orphan.
                    the child is living in dangerous circumstances and that there should not exist a reasonable
                     alternative to the child’s admission in the Orphanage.
                    Request from relatives of the child (if available).
                    Birth certificate and photo of the child.
                    Death certificate of parents or confirmation of their ‘missing’ status.
                    Application for admission from local authorities.
                    </p>
                </div>
              
                <button class="accordion">Why these children within the orphanage?</button>
                <div class="panel">
                    <p>
                    Sadly many children we come across originate from the most awful start in life.
                     Many are raped and abused both sexually and physically since birth, by family members.
                     Their lives changed immeasurably by falling pregnant once they hit puberty;
                     abandoned at the hospital with no home, no food and no way of paying the medical bill. 
                     These frightened children are taken to the shelter of children's centres or orphanages, but still live in abject poverty.
                    </p>
                </div>
               
                <button class="accordion">How do you intend to do this?</button>
                <div class="panel">
                    <p>By getting sponsors for each of our children, raising charitable donations and making connections with local businesses
                     so that we build an info-structure to help support our work.</p>
                </div>

                <button class="accordion"> How do you Sponsoring a child?</button>
                <div class="panel">
                    <p>At Afre-ken we believe passionately in and are committed to relieving 
                    the poverty created by adverse social conditions, eradicating poor health and 
                    the awful lack of education for some children in Africa. We can’t sadly help every
                     child facing poverty, but we do know we can make a real difference to the children in the care of Children’s Centres/orphanages we partner with. 
                     By focusing our attention on particular centre's, we can truly make a difference to their lives, 
                    and give them the chance of a future away from poverty.</p>
                </div>
                <button class="accordion">What are some meaningful activities to conduct at orphanage visits?</button>
                <div class="panel">
                    <p>
                        Engage children in prayers,cleaning, football and games such as kho-kho, kabbadi, relay, etc which does not
                        require any big material or play thing to conduct it yet is quite effective.
                        It helps the kids to learn team spirit, taking things sportively and learning to
                        trust their peers. Also while they play, a kid who has leadership trait would definitely
                        take in-charge and lead on. That trait can be nurtured and help him improve it. 
                        A few kids might not be good in studies but through these games he gets to know that he is good in sports. 
                        This improves his confidence and might change his life.
                    </p>
                </div>
                <button class="accordion">What can I donate?</button>
                <div class="panel">
                    <p>
                    You can donate food, clothes, money or any other materials to support the Orphanage Center. 
                    </p>
                </div>

                <div class="space"></div>
            </div>
            <?php include('footer.php') ?>
        </div>
    </div>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>

</body>

</html>