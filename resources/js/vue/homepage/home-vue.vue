<template>
    <div>
        <full-page ref="fullpage" :options="options" id="fullpage">

            <div class="section fp-auto-height-responsive" id="sectionHome">
                <div class="welcome-wrapper">
                    <div class="logo text-align-center">
                        <simple-svg
                                :filepath="'svg/logo.svg'"
                                :width="'100%'"
                                :height="'100%'"
                                :id="'logo'"
                        />
                    </div>
                    <div class="headline text-align-center">
                        <h1>This is us!</h1>
                    </div>
                    <div class="subheadline text-align-center">
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor nonumy
                            eirmod tempor nonumy eirmod tempor</p>
                    </div>
                    <div class="button text-align-center">
                        <a href="/register" class="btn btn-outline-primary">Join us now</a>
                    </div>
                    <div class="button-down">
                        <i @click="scrollDown()" class="fa fa-angle-down arrow"></i>
                    </div>
                </div>
            </div>

            <contentSection :filepath="'svg/homepage/undraw_add_to_cart_vkjp.svg'"
                            :title="'Shopping'"
                            :content="'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor\n'+
'                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et\n'+
'                                accusam et justo duo dolores'"
                            :classes="'homepage'"
                            :id="'sectionShopping'"></contentSection>

            <contentSection :filepath="'svg/homepage/undraw_content_vbqo.svg'"
                            :title="'News'"
                            :content="'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor\n'+
'                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et\n'+
'                                accusam et justo duo dolores'"
                            :classes="'homepage'"
                            :id="'sectionNews'"></contentSection>

            <contentSection :filepath="'svg/homepage/undraw_having_fun_iais.svg'"
                            :title="'Events'"
                            :content="'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor\n'+
'                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et\n'+
'                                accusam et justo duo dolores'"
                            :classes="'homepage'"
                            :id="'sectionEvents'"></contentSection>

            <contentSection :filepath="'svg/homepage/undraw_schedule_pnbk.svg'"
                            :title="'Cleaning'"
                            :content="'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor\n'+
'                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et\n'+
'                                accusam et justo duo dolores'"
                            :classes="'homepage'"
                            :id="'sectionCleaning'"></contentSection>
        </full-page>
    </div>
</template>

<style scoped>
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
        bottom: 100px;
        left: 0;
        margin: auto;
        width: 40px;
        height: 40px;
        transform: translateY(0);
        -webkit-transition: all 500ms ease-in-out;
        -moz-transition: all 750ms ease-in-out;
        -ms-transition: all 750ms ease-in-out;
        -o-transition: all 750ms ease-in-out;
        transition: all 750ms ease-in-out;
    }

    /*============================== comment ==============================
     this sets the position of the arrow when it's up, so it will
     move up or down by 14px when you add or remove this class
    ============================== end comment ==============================*/
    .lift {
        transform: translateY(14px);
    }
</style>

<script>
    import VueFullPage from 'vue-fullpage.js';
    import imgSvg from '../components/svg-img.vue';
    import contentSection from './contentSection.vue';

    Vue.use(VueFullPage);

    export default {
        components: {
            imgSvg,
            contentSection,
        },
        data() {
            return {
                options: {
                    licenseKey: 'ajl!lssT01',
                    lockAnchors: false,
                    navigation: true,
                    navigationPosition: 'right',
                    animateAnchor: true,
                    navigationTooltips: ["Section 1", "Section 2", "Section 3", "Section 4", "Section 5"],
                    scrollOverflow: true,
                    scrollBar: false,
                    afterLoad: function (anchorLink, index) {
                        /*============================== comment ==============================
                        load the sections
                        ============================= end comment ============================*/
                        // Slide #1 is loaded
                        if (index.index === 0) {
                            console.log('entering section ' + index.index)
                        }
                        // Slide #2 is loaded
                        if (index.index === 1) {
                            console.log('entering section ' + index.index)
                        }
                        // Slide #3 is loaded
                        else if (index.index === 2) {
                            console.log('entering section ' + index.index)
                        }
                        // Slide #4 is loaded
                        else if (index.index === 3) {
                            console.log('entering section ' + index.index)
                        }
                        // Slide #5 is loaded
                        else if (index.index === 4) {
                            console.log('entering section ' + index.index)
                        }
                    },

                    onLeave: function (index, nextIndex, direction) {
                        /*============================== comment ==============================
                        leavin the sections
                        ============================= end comment ============================*/
                        // Slide #1 is leaved
                        if (index.index === 0) {
                            console.log('leaving section ' + index.index)
                        }
                        // Slide #2 is leaved
                        if (index.index === 1) {
                            console.log('leaving section ' + index.index)
                        }
                        // Slide #3 is leaved
                        else if (index.index === 2) {
                            console.log('leaving section ' + index.index)
                        }
                        // Slide #4 is leaved
                        else if (index.index === 3) {
                            console.log('leaving section ' + index.index)
                        }
                        // Slide #5 is leaved
                        else if (index.index === 4) {
                            console.log('leaving section ' + index.index)
                        }

                    } // end of "onLeave" events


                },
            }
        },
        methods: {
            scrollDown() {
                fullpage_api.moveSectionDown();
            }
        }
    }


    /*============================== comment ==============================
    arrowBounce
    ============================= end comment ============================*/
    let arrowBounce = function () {
        let arrow = $(".arrow");
        if (arrow.hasClass("lift")) {
            arrow.removeClass("lift");
        } else {
            arrow.addClass("lift");
        }
    };

    /*============================== comment ==============================
    run the arrowBounce function every 800ms
    ============================= end comment ============================*/
    setInterval(arrowBounce, 800);
</script>