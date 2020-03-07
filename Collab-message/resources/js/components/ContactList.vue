<template>
    <div class="contact-list">
        <ul>
            <li v-for="(contact, index) in contacts" :key="contact.id" @click="selectContact(index, contact)" :class="{'selected': index == selected}">
                <div class="contact">
                    <p class="name">{{contact.name}}</p>
                    <p class="email">{{contact.email}}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:{
            contacts:{
                type: Array,
                default: []
            }
        },
        data(){
            return{
                selected: 0
            }
        },
        methods:{
            selectContact(index, contact){
                this.selected = index;
                this.$emit('selected', contact);
            }
        }

    }
</script>

<style lang="scss" scoped>
.contact-list {
    flex: 2;
    max-height: 100%;
    height: 600px;
    overflow: scroll;
    border-left: 1px solid #a6a6a6;
    
    ul {
        list-style-type: none;
        padding-left: 0;
        li {
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #aaaaaa;
            height: 80px;
            position: relative;
            cursor: pointer;
            &.selected {
                background: #dfdfdf;
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
            .contact {
                flex: 4;
                font-size: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;
                p {
                    margin: 0;
                    &.name {
                        font-weight: bold;
                    }
                }
            }
        }
    }
}
</style>