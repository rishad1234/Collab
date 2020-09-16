<template>
    <div class="feed" ref="feed">
        <ul v-if="contact">
            <li v-for="message in messages" :class="`message${message.to == contact.id ? ' sent' : ' received'}`" :key="message.id">
                <div class="text">
                    {{ message.text }}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            contact: {
                type: Object
            },
            messages: {
                type: Array,
                required: true
            }
        },
        mounted() {
            // tablet 
            var getWidth = $(window).width();
            if(getWidth <= 1024){
                $(".feed").css("max-height","1094px");
            }
        },
        methods: {
            scrollToBottom() {
                setTimeout(() => {
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                }, 50);
            }
        },
        watch: {
            contact(contact) {
                this.scrollToBottom();
            },
            messages(messages) {
                this.scrollToBottom();
            }
        }
    }
</script>

<style lang="scss" scoped>
::-webkit-scrollbar {
    width: 0px;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
.feed {
    background: #F8F9FA;
    height: 100%;
    border-radius: 10px;
    max-height: 570px;
    overflow: scroll;

    ul {
        list-style-type: none;
        padding: 5px;

        li {
            &.message {
                margin: 10px 0;
                width: 100%;

                .text {
                    max-width: 200px;
                    border-radius: 15px;
                    padding: 10px;
                    padding-top: 7px;
                    padding-bottom: 8px;
                    display: inline-block;
                }

                &.received {
                    text-align: right;

                    .text {
                        background: #738F93;
                        color:white;
                        font-size:13px;
                    }
                }

                &.sent {
                    text-align: left;

                    .text {
                        background: #32C766;
                        color: white;
                        font-size:13px;
                    }
                }
            }
        }
    }
}

</style>

