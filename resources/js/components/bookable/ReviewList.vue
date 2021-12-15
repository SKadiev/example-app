<template>
    <div style="padding: 1.25rem">
        <h6 class="text-uppercase text-secondary font-weight-bolder pt-4">Review List</h6>
        <div class="border-bottom d-none d-md-block" v-for="number in 3" :key="number">
            <div class="row pt-4">
                <div class="col-md-6">
                    Dzole Dzolevski
                </div>
                <div class="col-md-6 d-flex justify-content-end">Star Rating</div>

                <div class="row">
                    <div class="col-m-12">Added 5 months ago</div>
                </div>

                <div class="row pt-4 pb-4">
                    <div class="col-md-12">
                        Content of review
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>