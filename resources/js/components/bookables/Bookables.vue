<template>
    <div>
        {{ rows }}
        <div v-if="loading">
            Data is loading
        </div>
        <div v-else>
            <div class="row mb-4" v-for="row in rows" :key="'row' + row">
                <div class="col d-flex align-items-strech"
                 v-for="(bookable, column) in bookablesInRow(row)"
                :key="'row' + row + column">       
                    <bookable-list-item 
                        :title="bookable.title"
                        :content="bookable.content" 
                        :id="bookable.id">
                    </bookable-list-item>
                </div>
                <div class="col" v-for="p in placaholdersInRow(row)" :key="'placeholder' + row + p"></div>
            </div>
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
            loading: false,
            columns: 3
        }
    },

    computed: {
      rows() {
          return this.bookables === null
            ? 0
            : Math.ceil(this.bookables.length / this.columns)
      }
        
    },
    
    methods: {

        bookablesInRow(row) {
            return this.bookables.slice((row - 1) * this.columns, row * this.columns)
        },
        placaholdersInRow(row) {
            return this.columns - this.bookablesInRow(row).length;
        }

    },

    created() {
        this.loading = true;
        axios.get('/api/bookable')
            .then(result => result.data)
            .then(data => this.bookables = data)
            .then(() => this.loading = false)
            .catch(err => console.log(err));

    }
}
</script>