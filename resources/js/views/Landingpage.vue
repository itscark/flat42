<template>
    <div>
        <full-page ref="fullpage" :options="options" id="fullpage">
            <div class="section fp-auto-height-responsive" id="sectionHome">
                <div class="welcome-wrapper">
                    <div class="logo text-align-center">
                        <svg id="logo" class="text__word">
                            <use
                                class="text__word"
                                xlink:href="svg/logo.svg#logo"
                            ></use>
                        </svg>
                        <span class="logo-bg"></span>
                    </div>
                    <div class="headline text-align-center">
                        <div class="headline-wrapper">
                            <h1 id="headline" class="text__word">
                                This is Flat42!
                            </h1>
                            <span class="headline-bg"></span>
                        </div>
                    </div>
                    <div class="subheadline text-align-center">
                        <p class="subheadline-text">
                            Wir helfen euch, euren Haushalt zu managen!
                        </p>
                    </div>
                    <div class="button text-align-center opacity">
                        <a href="/register" class="btn btn-outline-primary"
                            >Join us now</a
                        >
                    </div>
                    <div class="button-down hide opacity">
                        <i
                            @click="scrollDown()"
                            class="fa fa-angle-down arrow"
                        ></i>
                    </div>
                </div>
            </div>

            <contentSection
                :filepath="this.content[0].img_url"
                :title="this.content[0].title"
                :animation-title="'Shopping'"
                :content="this.content[0].body"
                :classes="'homepage'"
                :id="this.content[0].section_id"
            ></contentSection>

            <contentSection
                :filepath="this.content[1].img_url"
                :title="this.content[1].title"
                :animation-title="'News'"
                :content="this.content[1].body"
                :classes="'homepage'"
                :id="this.content[1].section_id"
            ></contentSection>

            <contentSection
                :filepath="this.content[2].img_url"
                :title="this.content[2].title"
                :animation-title="'Events'"
                :content="this.content[2].body"
                :classes="'homepage'"
                :id="this.content[2].section_id"
            ></contentSection>

            <contentSection
                :filepath="this.content[3].img_url"
                :title="this.content[3].title"
                :animation-title="'Cleaning'"
                :content="this.content[3].body"
                :classes="'homepage'"
                :id="this.content[3].section_id"
            ></contentSection>
        </full-page>
    </div>
</template>

<script>
import VueFullPage from "vue-fullpage.js";
import contentSection from "../components/homepage/contentSection.vue";
import { TweenMax, svgMorph, TimelineLite } from "gsap";

Vue.use(VueFullPage);

export default {
    components: {
        contentSection
    },
    props: ["content"],
    data() {
        return {
            word: $(".text__word"),
            options: {
                licenseKey: "ajl!lssT01",
                lockAnchors: false,
                navigation: true,
                navigationPosition: "right",
                animateAnchor: true,
                scrollOverflow: true,
                scrollBar: false,
                afterLoad: this.afterLoad,
                onLeave: this.onLeave,
                responsiveWidth: 800,
                afterResponsive: function(isResponsive) {}
            }
        };
    },

    mounted() {
        this.setVariables();
    },

    methods: {
        setVariables() {
            /*============================== comment ==============================
                Hero section Variablen
                ======================================================================*/
            this.word = document.querySelectorAll(".text__word");
            this.logoBg = document.querySelectorAll(".logo-bg");
            this.headlineBG = document.querySelectorAll(".headline-bg");
            this.subheadline = document.querySelectorAll(".subheadline");
            this.buttonDown = document.querySelectorAll(".button-down");
            this.button = document.querySelectorAll(".button");

            /*============================== comment ==============================
                        Shopping Section Variablen
                        ======================================================================*/
            this.text = $(".Shopping");
            this.shoppingItems = $(".hopping-item");
        },

        scrollDown() {
            fullpage_api.moveSectionDown();
        },

        /*============================== comment ==============================
                    after loading the sections
                    ============================= end comment ============================*/
        afterLoad(anchorLink, index) {
            /*============================== Slide #1 is loaded ==============================*/
            if (index.index === 0) {
                this.showHomeContent();
            }

            /*============================== Slide #2 is loaded ==============================*/
            if (index.index === 1) {
                this.showShoppingContent();
            } else if (index.index === 2) {
                /*============================== Slide #3 is loaded ==============================*/
                this.showNewsContent();
            } else if (index.index === 3) {
                /*============================== Slide #4 is loaded ==============================*/
                this.showEventContent();
            } else if (index.index === 4) {
                /*============================== Slide #5 is loaded ==============================*/
                this.showCleaningContent();
            }
        },

        onLeave(index, nextIndex, direction) {
            /*============================== comment ==============================
                        leaving the sections
                        ======================================================================*/
            // Slide #1 is leaved
            if (index.index === 0) {
                this.hideHomeContent();
            }
            // Slide #2 is leaved
            if (index.index === 1) {
                this.hideShoppingContent();
            }
            // Slide #3 is leaved
            else if (index.index === 2) {
                this.hideNewsContent();
            }
            // Slide #4 is leaved
            else if (index.index === 3) {
                this.hideEventContent();
            }
            // Slide #5 is leaved
            else if (index.index === 4) {
                this.hideCleaningContent();
            }
        },

        /*============================== comment ==============================
                    home content
                    ======================================================================*/
        showHomeContent() {
            let tl = new TimelineLite({});
            tl.to(this.logoBg, 0.3, { scaleY: 1 })
                .to(this.headlineBG, 0.3, { scaleY: -1 })
                .to(this.word, 0.5, { opacity: 1 }, "-=0.1")
                .to(this.logoBg, 0.2, { scaleY: 0 })
                .to(this.headlineBG, 0.2, { scaleY: 0 }, 1)
                .to(this.subheadline, 0.5, { opacity: 1 }, "-=0.1")
                .to(this.button, 0.5, { opacity: 1 }, "-=0.1")
                .to(this.buttonDown, 0.5, { opacity: 1 }, "-=0.1");
        },

        hideHomeContent() {
            let tl = new TimelineLite({});

            tl.to(this.logoBg, 0.2, { scaleY: 0 })
                .to(this.headlineBG, 0.2, { scaleY: -1 })
                .to(this.word, 0.1, { opacity: 0 }, "-=0.1")
                .to(this.logoBg, 0.2, { scaleY: 1 })
                .to(this.headlineBG, 0.2, { scaleY: 0 })
                .to(this.logoBg, 0.2, { scaleY: 0 })
                .to(this.subheadline, 0.3, { opacity: 0 }, "-=0.1")
                .to(this.button, 0.3, { opacity: 0 }, "-=0.1")
                .to(this.buttonDown, 0.3, { opacity: 0 }, "-=0.1");
        },

        /*============================== comment ==============================
                    shopping content
                    ======================================================================*/
        showShoppingContent() {
            /*============================== select Shopping items ==============================*/
            let shoppingItem1 = document.getElementById("shopping-item-1");
            let shoppingItem2 = document.getElementById("shopping-item-2");
            let shoppingItem3 = document.getElementById("shopping-item-3");
            let shoppingItem4 = document.getElementById("shopping-item-4");
            let shoppingItem5 = document.getElementById("shopping-item-5");
            let shoppingItem6 = document.getElementById("shopping-item-6");
            let shoppingItem7 = document.getElementById("shopping-item-7");
            let shoppingItem8 = document.getElementById("shopping-item-8");
            let shoppingItem9 = document.getElementById("shopping-item-9");

            /*============================== select background Element ==============================*/
            let backgroundElement = document.querySelectorAll(
                ".background-Shopping"
            );

            /*============================== select browser ==============================*/
            let browser = document.getElementById("browser");

            /*============================== get backroung ==============================*/
            let background = document.getElementById("background");

            /*============================== leaves ==============================*/
            let leaves = document.getElementById("leaves");
            let flowers = document.getElementById("flower-top");
            let flowers_ground = document.getElementById("ground-flower");
            let woman = document.getElementById("woman");
            let shadow = document.getElementById("shadow");
            let cart = document.getElementById("cart");

            /*============================== timeline ==============================*/
            let tl = new TimelineLite({})
                /*============================== background ==============================*/
                .fromTo(background, 1, { opacity: 0 }, { opacity: 0.1 }, 0)

                /*============================== browser ==============================*/
                .fromTo(browser, 1, { opacity: 0 }, { opacity: 1 }, 0)

                .to(backgroundElement, 0.2, { scaleY: 1 })
                .to(this.text, 0.2, { opacity: 1 })
                .to(backgroundElement, 0.2, { scaleY: 0 })

                /*============================== text ==============================*/
                //.fromTo(this.text, 1, {opacity: 0}, {opacity: 1})

                /*============================== plants ==============================*/
                .fromTo(leaves, 1, { opacity: 0 }, { opacity: 1 }, 1)
                .fromTo(flowers, 1, { opacity: 0 }, { opacity: 1 }, 1)
                .fromTo(flowers_ground, 1, { opacity: 0 }, { opacity: 1 }, 1)

                /*============================== shopping items ==============================*/
                .fromTo(shoppingItem1, 1, { opacity: 0 }, { opacity: 1 }, 0.5)
                .fromTo(shoppingItem2, 1, { opacity: 0 }, { opacity: 0.2 }, 0.6)
                .fromTo(shoppingItem3, 1, { opacity: 0 }, { opacity: 0.2 }, 0.6)
                .fromTo(shoppingItem4, 1, { opacity: 0 }, { opacity: 0.2 }, 0.7)
                .fromTo(shoppingItem5, 1, { opacity: 0 }, { opacity: 0.2 }, 0.7)
                .fromTo(shoppingItem6, 1, { opacity: 0 }, { opacity: 0.2 }, 0.6)
                .fromTo(shoppingItem7, 1, { opacity: 0 }, { opacity: 0.2 }, 0.8)
                .fromTo(shoppingItem8, 1, { opacity: 0 }, { opacity: 0.2 }, 0.4)
                .fromTo(shoppingItem9, 1, { opacity: 0 }, { opacity: 0.2 }, 0.7)

                /*============================== women ==============================*/
                .fromTo(woman, 2, { opacity: 0 }, { opacity: 1 }, 0.9)
                .fromTo(shadow, 2, { opacity: 0 }, { opacity: 1 }, 0.8)
                .fromTo(cart, 2, { opacity: 0 }, { opacity: 1 }, 1);
        },

        hideShoppingContent() {
            /*============================== select Shopping items ==============================*/
            let shoppingItem1 = document.getElementById("shopping-item-1");
            let shoppingItem2 = document.getElementById("shopping-item-2");
            let shoppingItem3 = document.getElementById("shopping-item-3");
            let shoppingItem4 = document.getElementById("shopping-item-4");
            let shoppingItem5 = document.getElementById("shopping-item-5");
            let shoppingItem6 = document.getElementById("shopping-item-6");
            let shoppingItem7 = document.getElementById("shopping-item-7");
            let shoppingItem8 = document.getElementById("shopping-item-8");
            let shoppingItem9 = document.getElementById("shopping-item-9");

            /*============================== select browser ==============================*/
            let browser = document.getElementById("browser");

            /*============================== get backgroung ==============================*/
            let background = document.getElementById("background");

            /*============================== leaves ==============================*/
            let leaves = document.getElementById("leaves");
            let flowers = document.getElementById("flower-top");
            let flowers_ground = document.getElementById("ground-flower");
            let woman = document.getElementById("woman");
            let shadow = document.getElementById("shadow");
            let cart = document.getElementById("cart");

            /*============================== select background Element ==============================*/
            let backgroundElement = document.querySelectorAll(
                ".background-Shopping"
            );

            let tl = new TimelineLite({})
                .fromTo(background, 1, { opacity: 0.1 }, { opacity: 0 }, 0)

                /*============================== browser ==============================*/
                .fromTo(browser, 1, { opacity: 1 }, { opacity: 0 }, 0)

                /*============================== text ==============================*/
                .to(backgroundElement, 0.2, { scaleY: 1 })
                .to(this.text, 0.5, { opacity: 0 })
                .to(backgroundElement, 0.2, { scaleY: 0 })

                /*============================== plants ==============================*/
                .fromTo(leaves, 0.5, { opacity: 1 }, { opacity: 0 }, 0.5)
                .fromTo(flowers, 0.5, { opacity: 1 }, { opacity: 0 }, 0.5)
                .fromTo(
                    flowers_ground,
                    0.5,
                    { opacity: 1 },
                    { opacity: 0 },
                    0.5
                )

                /*============================== shopping items ==============================*/
                .fromTo(shoppingItem1, 0.5, { opacity: 1 }, { opacity: 0 }, 0.5)
                .fromTo(
                    shoppingItem2,
                    0.5,
                    { opacity: 0.2 },
                    { opacity: 0 },
                    0.5
                )
                .fromTo(
                    shoppingItem3,
                    0.5,
                    { opacity: 0.2 },
                    { opacity: 0 },
                    0.5
                )
                .fromTo(
                    shoppingItem4,
                    0.5,
                    { opacity: 0.2 },
                    { opacity: 0 },
                    0.5
                )
                .fromTo(
                    shoppingItem5,
                    0.5,
                    { opacity: 0.2 },
                    { opacity: 0 },
                    0.5
                )
                .fromTo(
                    shoppingItem6,
                    0.5,
                    { opacity: 0.2 },
                    { opacity: 0 },
                    0.5
                )
                .fromTo(
                    shoppingItem7,
                    0.5,
                    { opacity: 0.2 },
                    { opacity: 0 },
                    0.5
                )
                .fromTo(
                    shoppingItem8,
                    0.5,
                    { opacity: 0.2 },
                    { opacity: 0 },
                    0.5
                )
                .fromTo(
                    shoppingItem9,
                    0.5,
                    { opacity: 0.2 },
                    { opacity: 0 },
                    0.5
                )

                /*============================== women ==============================*/
                .fromTo(woman, 1, { opacity: 1 }, { opacity: 0 }, 0.5)
                .fromTo(shadow, 1, { opacity: 1 }, { opacity: 0 }, 0.5)
                .fromTo(cart, 1, { opacity: 1 }, { opacity: 0 }, 0.5);
        },

        /*============================== comment ==============================
                    news content
                    ======================================================================*/
        showNewsContent() {
            let newsContent = document.querySelectorAll(".News");
            let newsLeave = document.getElementById("newsLeave");
            let newsBrowser = document.getElementById("newsBrowser");
            let newsPlant = document.getElementById("newsPlant");
            let newsLeftPerson = document.getElementById("newsLeftPerson");
            let newsRightPerson = document.getElementById("newsRightPerson");
            /*============================== select background Element ==============================*/
            let backgroundElement = document.querySelectorAll(
                ".background-News"
            );

            let tl = new TimelineLite({});

            TweenMax.set(newsContent, { opacity: 0 });
            tl.fromTo(newsLeave, 1, { opacity: 0 }, { opacity: 1 }, 0.4)
                .fromTo(newsBrowser, 1, { opacity: 0 }, { opacity: 1 }, 0.6)
                .fromTo(newsPlant, 1, { opacity: 0 }, { opacity: 1 }, 0.5)

                /*============================== text ==============================*/
                .to(backgroundElement, 0.2, { scaleY: 1 })
                .to(newsContent, 0.2, { opacity: 1 }, "-=0.1")
                .to(backgroundElement, 0.2, { scaleY: 0 })

                .fromTo(newsLeftPerson, 1, { opacity: 0 }, { opacity: 1 }, 0.7)
                .fromTo(
                    newsRightPerson,
                    1,
                    { opacity: 0 },
                    { opacity: 1 },
                    0.3
                );
        },

        hideNewsContent() {
            let newsContent = document.querySelectorAll(".News");
            let newsLeave = document.getElementById("newsLeave");
            let newsBrowser = document.getElementById("newsBrowser");
            let newsPlant = document.getElementById("newsPlant");
            let newsLeftPerson = document.getElementById("newsLeftPerson");
            let newsRightPerson = document.getElementById("newsRightPerson");
            let backgroundElement = document.querySelectorAll(
                ".background-News"
            );
            let tl = new TimelineLite({});

            tl.fromTo(newsLeave, 1, { opacity: 1 }, { opacity: 0 }, 0.3)
                .fromTo(newsBrowser, 1, { opacity: 1 }, { opacity: 0 }, 0.3)

                /*============================== text ==============================*/
                .to(backgroundElement, 0.2, { scaleY: 1 })
                .to(newsContent, 0.5, { opacity: 0 }, "-=0.1")
                .to(backgroundElement, 0.2, { scaleY: 0 })

                .fromTo(newsPlant, 1, { opacity: 1 }, { opacity: 0 }, 0.3)
                .fromTo(newsLeftPerson, 1, { opacity: 1 }, { opacity: 0 }, 0.3)
                .fromTo(
                    newsRightPerson,
                    1,
                    { opacity: 1 },
                    { opacity: 0 },
                    0.3
                );
        },

        /*============================== comment ==============================
                    event content
                    ======================================================================*/
        showEventContent() {
            let eventsContent = document.querySelectorAll(".Events");
            let eventsBackground = document.getElementById("eventsBackground");
            let eventsTree = document.getElementById("eventsTree");
            let eventsDudeLeft = document.getElementById("eventsDudeLeft");
            let eventsGirlLeft = document.getElementById("eventsGirlLeft");
            let eventsDudeRight = document.getElementById("eventsDudeRight");
            let eventsGirlRight = document.getElementById("eventsGirlRight");
            let backgroundElement = document.querySelectorAll(
                ".background-Events"
            );

            let tl = new TimelineLite({});

            TweenMax.set(eventsContent, { opacity: 0 });
            tl.fromTo(eventsBackground, 1, { opacity: 0 }, { opacity: 1 }, 0.5)
                .fromTo(eventsTree, 1, { opacity: 0 }, { opacity: 1 }, 0.4)

                /*============================== text ==============================*/
                .to(backgroundElement, 0.2, { scaleY: 1 })
                .to(eventsContent, 0.2, { opacity: 1 }, "-=0.1")
                .to(backgroundElement, 0.2, { scaleY: 0 })

                .fromTo(
                    eventsDudeLeft,
                    1,
                    { opacity: 0 },
                    { opacity: 1 },
                    .3
                )
                .fromTo(
                    eventsGirlLeft,
                    1,
                    { opacity: 0 },
                    { opacity: 1 },
                    .3
                )
                .fromTo(
                    eventsDudeRight,
                    1,
                    { opacity: 0 },
                    { opacity: 1 },
                    .4
                )
                .fromTo(
                    eventsGirlRight,
                    1,
                    { opacity: 0 },
                    { opacity: 1 },
                    1
                );
        },

        hideEventContent() {
            let eventsContent = document.querySelectorAll(".Events");
            let eventsBackground = document.getElementById("eventsBackground");
            let eventsTree = document.getElementById("eventsTree");
            let eventsDudeLeft = document.getElementById("eventsDudeLeft");
            let eventsGirlLeft = document.getElementById("eventsGirlLeft");
            let eventsDudeRight = document.getElementById("eventsDudeRight");
            let eventsGirlRight = document.getElementById("eventsGirlRight");
            let backgroundElement = document.querySelectorAll(
                ".background-Events"
            );

            let tl = new TimelineLite({});

            tl.fromTo(eventsBackground, 1, { opacity: 1 }, { opacity: 0 }, 0.3)
                .fromTo(eventsTree, 1, { opacity: 1 }, { opacity: 0 }, 0.3)
                .fromTo(eventsDudeLeft, 1, { opacity: 1 }, { opacity: 0 }, 0.3)
                /*============================== text ==============================*/
                .to(backgroundElement, 0.2, { scaleY: 1 })
                .to(eventsContent, 0.5, { opacity: 0 }, "-=0.1")
                .to(backgroundElement, 0.2, { scaleY: 0 })

                .fromTo(eventsGirlLeft, 1, { opacity: 1 }, { opacity: 0 }, 0.3)
                .fromTo(eventsDudeRight, 1, { opacity: 1 }, { opacity: 0 }, 0.3)
                .fromTo(
                    eventsGirlRight,
                    1,
                    { opacity: 1 },
                    { opacity: 0 },
                    0.3
                );
        },

        /*============================== comment ==============================
                    cleaning content
                    ======================================================================*/
        showCleaningContent() {
            let cleaningContent = document.querySelectorAll(".Cleaning");
            let cleaningBackground = document.getElementById(
                "cleaningBackground"
            );
            let cleaningPlant = document.getElementById("cleaningPlant");
            let cleaningBrowser = document.getElementById("cleaningBrowser");
            let cleaningGrayPostit = document.getElementById(
                "cleaningGrayPostit"
            );
            let cleaningYellowPostit = document.getElementById(
                "cleaningYellowPostit"
            );
            let cleaningRedPostit = document.getElementById(
                "cleaningRedPostit"
            );
            let cleaningWoman = document.getElementById("cleaningWoman");
            let cleaningBluePostit = document.getElementById(
                "cleaningBluePostit"
            );
            let backgroundElement = document.querySelectorAll(
                ".background-Cleaning"
            );

            let tl = new TimelineLite({});

            TweenMax.set(cleaningContent, { opacity: 0 });
            tl.fromTo(
                cleaningBackground,
                .6,
                { opacity: 0 },
                { opacity: 0.2 },
                1.2
            )
                .fromTo(cleaningPlant, .6, { opacity: 0 }, { opacity: 1 }, 1.2)
                .fromTo(
                    cleaningBrowser,
                    .6,
                    { opacity: 0 },
                    { opacity: 1 },
                    1.3
                )
                .fromTo(
                    cleaningGrayPostit,
                    .6,
                    { opacity: 0 },
                    { opacity: 0.2 },
                    1.3
                )

                /*============================== text ==============================*/
                .to(backgroundElement, 0.2, { scaleY: 1 })
                .to(cleaningContent, 0.2, { opacity: 1 }, "-=0.1")
                .to(backgroundElement, 0.2, { scaleY: 0 })

                .fromTo(
                    cleaningYellowPostit,
                    .6,
                    { opacity: 0 },
                    { opacity: 1 },
                    1.4
                )
                .fromTo(
                    cleaningRedPostit,
                    .6,
                    { opacity: 0 },
                    { opacity: 1 },
                    1.4
                )
                .fromTo(cleaningWoman, .6, { opacity: 0 }, { opacity: 1 }, 1.4)
                .fromTo(
                    cleaningBluePostit,
                    .6,
                    { opacity: 0 },
                    { opacity: 1 },
                    1.4
                );
        },

        hideCleaningContent() {
            let cleaningContent = document.querySelectorAll(".Cleaning");
            let cleaningBackground = document.getElementById(
                "cleaningBackground"
            );
            let cleaningPlant = document.getElementById("cleaningPlant");
            let cleaningBrowser = document.getElementById("cleaningBrowser");
            let cleaningGrayPostit = document.getElementById(
                "cleaningGrayPostit"
            );
            let cleaningYellowPostit = document.getElementById(
                "cleaningYellowPostit"
            );
            let cleaningRedPostit = document.getElementById(
                "cleaningRedPostit"
            );
            let cleaningWoman = document.getElementById("cleaningWoman");
            let cleaningBluePostit = document.getElementById(
                "cleaningBluePostit"
            );
            let backgroundElement = document.querySelectorAll(
                ".background-Cleaning"
            );

            let tl = new TimelineLite({});

            tl.fromTo(
                cleaningBackground,
                1,
                { opacity: 1 },
                { opacity: 0 },
                0.3
            )
                .fromTo(cleaningPlant, 1, { opacity: 1 }, { opacity: 0 }, 0.3)
                .fromTo(cleaningBrowser, 1, { opacity: 1 }, { opacity: 0 }, 0.3)

                /*============================== text ==============================*/
                .to(backgroundElement, 0.2, { scaleY: 1 })
                .to(cleaningContent, 0.5, { opacity: 0 }, "-=0.1")
                .to(backgroundElement, 0.2, { scaleY: 0 })

                .fromTo(
                    cleaningGrayPostit,
                    1,
                    { opacity: 1 },
                    { opacity: 0 },
                    0.3
                )
                .fromTo(
                    cleaningYellowPostit,
                    1,
                    { opacity: 1 },
                    { opacity: 0 },
                    0.3
                )
                .fromTo(
                    cleaningRedPostit,
                    1,
                    { opacity: 1 },
                    { opacity: 0 },
                    0.3
                )
                .fromTo(cleaningWoman, 1, { opacity: 1 }, { opacity: 0 }, 0.3)
                .fromTo(
                    cleaningBluePostit,
                    1,
                    { opacity: 1 },
                    { opacity: 0 },
                    0.3
                );
        }
    }
};

/*============================== comment ==============================
            arrowBounce
            ============================= end comment ============================*/
let arrowBounce = function() {
    let arrow = $(".arrow");
    if (arrow.hasClass("lift")) {
        arrow.removeClass("lift");
    } else {
        arrow.addClass("lift");
    }
};

/*============================== run the arrowBounce function every 800ms ==============================*/
setInterval(arrowBounce, 800);
</script>

<style>
/*============================== comment ==============================
    
            =====================================================================*/
.text__word,
.subheadline,
.opacity {
    opacity: 0;
}

.logo,
.headline,
.root-element {
    position: relative;
}

.logo-bg {
    background-color: #13a399;
}

.headline-bg {
    background-color: #13a399;
}

.logo-bg,
.headline-bg,
.background-Shopping {
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 100;
    transform-origin: left;
    transform: scaleY(0);
}

.headline {
    width: 40%;
    justify-self: center;
}

.welcome-wrapper {
    display: grid;
    grid-gap: 50px;
    grid-template-areas: "logo" "headline" "subheadline" "button" "button-down";
}

.text-align-center {
    text-align: center;
}

.logo {
    grid-area: logo;
    height: 100px;
    width: 100px;
    margin-top: 40px;
    display: flex;
    justify-self: center;
}

.headline {
    grid-area: headline;
}

.subheadline {
    grid-area: subheadline;
}

.button {
    grid-area: button;
}

.button-down {
    grid-area: button-down;
    position: relative;
}

@media screen and (min-width: 600px) {
    .logo {
        height: 200px;
        width: 200px;
        margin-top: 0;
    }

    h1 {
        font-size: 3.5rem !important;
    }
}

/*============================== comment ==============================
            bounce arrow
            ============================= end comment ============================*/
.arrow {
    cursor: pointer;
    white-space: nowrap;
    font-size: 4rem;
    position: absolute;
    right: 0;
    bottom: 120px;
    left: 0;
    margin: auto;
    width: 40px;
    height: 40px;
    transform: translateY(0);
    transition: all 750ms ease-in-out;
}

/*============================== this sets the position of the arrow when it's up, so it will
             move up or down by 14px when you add or remove this class ==============================*/
.lift {
    transform: translateY(14px);
}
</style>
