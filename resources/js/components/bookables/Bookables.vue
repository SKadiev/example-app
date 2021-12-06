<template>
    <div>
        <div v-if="loading">
            Data is loading
        </div>
        <div v-else>

        <bookable-list-item 
            v-for="(bookable, index) in bookables"
            :key="index"
            :item-title="bookable.title"
            :item-content="bookable.content" 
            :price=5>
        </bookable-list-item>
        </div>
    </div>
</template>

<script>
import BookableListItem from './BookableListItem.vue';

export default {
    components:{
        BookableListItem
    },
    data() {
        return {
            bookables: null,
            loading: false
        }
    },

    created() {
        this.loading = true;
        setTimeout(() => {
            this.bookables = [
                {
                    title: "cheap villa",
                    content: "very cheap vila"
                },

                {
                    title: "cheap villa 2",
                    content: "very cheap vila 2"
                }
            ];
            this.loading = false;


        }, 1000)

    }
}
</script>