<template>
    <div>
        <div v-if="loading">
             Data is loading
        </div>
        <div v-else>
            <div class="row mb-4">
                <div class="col">       
                    <bookable-list-item 
                        :item-title="bookable.title"
                        :item-content="bookable.content" 
                        :price=5>
                    </bookable-list-item>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BookableListItem from '../bookables/BookableListItem.vue';

export default {

    components: {
        BookableListItem
    },

    data() {
        return {
            loading: false,
            bookable: null
        }
    },

    created() {
        this.loading = true;
        const bookableIdentifier = this.getSingleBookableUrl();
        if (bookableIdentifier) {
            axios.get("/api/bookables/" + bookableIdentifier)
                .then(result => result.data)
                .then(data => this.bookable = data)
                .then(() => this.loading = false)
                .catch(err => {
                    alert('Not item with this id');
                    this.$router.go(-1);

                });
        }
    },

    methods: {
        getSingleBookableUrl() {
            return this.$route.params.id ?? null;
        }

    }
   

    
}

</script>