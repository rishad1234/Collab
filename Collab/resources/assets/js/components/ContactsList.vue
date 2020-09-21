<template>
    <div class="contacts-list">
        <ul>
            <li v-for="contact in sortedContacts" :key="contact.id" @click="selectContact(contact)" :class="{ 'selected': contact == selected }">
                <div class="avatar">
                    <img v-if="contact.profile_image !== null" :src="'storage/' + contact.profile_image" :alt="contact.name">
                    <img v-else-if="contact.profile_image === null" :src="'images/unisex-avatar.png'" :alt="contact.name">
                </div>
                <div class="contact">
                    <p class="name">{{ contact.name }}</p>
                </div>
                <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
            </li>
        </ul>
    </div>
</template>

<script>

    
    export default {
        props: {
            contacts: {
                type: Array,
                default: []
            },
            selectedMobile:{
                type: String
            }
        },
        data() {
            return {
                selected: this.contacts.length ? this.contacts[0] : null
            };
        },
        methods: {
            selectContact(contact) {
                this.selected = contact;

                this.$emit('selected', contact);
            }
        },
        mounted() {
            // tablet 
            var getWidth = $(window).width();
            console.log(getWidth);
            if(getWidth <= 1024){
                console.log("Hi");
                $(".contacts-list").css("flex","3");
            }
        },
        computed: {
            sortedContacts() {
                
                return _.sortBy(this.contacts, [(contact) => {
                    if (contact == this.selected) {
                        return Infinity;
                    }

                    return contact.unread;
                }]).reverse();
            }
        }
    }
    
</script>

<style lang="scss" scoped>
::-webkit-scrollbar {
    width: 0px;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
$tab_break: 1023px;
$mobile_break: 768px;

.contacts-list {
    flex: 2;
    max-height: 100%;
    height: 100%;
    overflow: scroll;
    // border-left: 1px solid #a6a6a6;
    
    ul {
        list-style-type: none;
        padding-left: 0;
        

        li {
            display: flex;
            padding: 2px;
            // border-bottom: 1px solid #aaaaaa;
            height: 70px;
            background: #dfdfdf;
            margin-right: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            padding: 10px;
            position: relative;
            cursor: pointer;

            &.selected {
                background: #bde6cd;
            }

            span.unread {
                background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;
            }

            .avatar {
                flex: 1;
                display: flex;
                align-items: center;

                img {
                    width: 55px;
                    height: 55px;
                    border: 2px solid grey;
                    border-radius: 50%;
                    object-fit: cover;
                    margin: 0 auto;
                }
            }

            .contact {
                flex: 3;
                font-size: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;

                p {
                    margin: 0;

                    &.name {
                        font-weight: bold;
                        font-size: 18px;
                    }
                    
                }
            }
        }
    }
}
@media screen and (max-width: $tab_break) {
    .contact{
        padding-left: 10px;
    }
    .name{
        font-size: 16px !important;
    }
}
@media screen and (max-width: 767px){
    .contacts-list {
        height: 50% !important;
    }
}

</style>
