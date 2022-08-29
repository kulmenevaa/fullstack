<style scoped>
    .my-datepicker >>> .my-datepicker_calendar {
        border: 0;
        width: 100%;
    }
    .my-datepicker >>> .my-datepicker_calendar .cell:hover {
        border-radius: 50%;
    }
    .my-datepicker >>> .my-datepicker_calendar .cell.today {
        color: #cf4520;
        font-weight: 600;
    }
    .my-datepicker >>> .my-datepicker_calendar .cell.selected  {
        background-color: transparent;
        border: 1px solid #cf4520;
        border-radius: 50%;
    }
</style>

<template>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">Выберите дату в календаре, чтобы посмотреть мероприятия на этот день.</div>
                <div class="col-lg-3 col-12">
                    <datepicker class="my-datepicker" 
                        calendar-class="my-datepicker_calendar" 
                        :format="customDate" 
                        v-model="time" 
                        :inline="true" 
                        :language="ru"
                        :disabledDates="disabledDates"
                        monday-first
                    />
                </div>
                <div class="col-lg-6 col-12 mb-4 pb-2" v-for="(e, index) in events">
                    <div class="card blog rounded border-0 shadow overflow-hidden">
                        <div class="row">
                            <div class="col-md-6">
                                <img :src="'/public/img/events/' + e.image" style="max-width: 100%; header: auto" alt="">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body content">
                                    <h5 class="card-title title text-dark">{{ e.title }}</h5>
                                    <div class="post-meta d-flex justify-content-between mt-3">
                                        <ul class="list-unstyled mb-0">
                                            <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                                        </ul>
                                        <a href="" class="text-muted readmore">Подробнее <i class="uil uil-angle-right-b align-middle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!--
    <section class="events">
        
        <datepicker class="my-datepicker" 
                calendar-class="my-datepicker_calendar" 
                :format="customDate" 
                v-model="time" 
                :inline="true" 
                :language="ru"
                :disabledDates="disabledDates"
                monday-first></datepicker>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(e, index) in events">
                    <td scope ="row">{{ index+1 }}</td>
                    <td>{{ e.title }}</td>
                </tr>
                <tr>
                    <td v-if="events.length == 0 && !errors" colspan="2">На {{ this.time }} мероприятий нет!</td>
                </tr>
                <tr v-if="errors">
                    <td colspan="2">Ошибка загрузки данных!</td>
                </tr>
            </tbody>
        </table>
    </section>
    -->
</template>
<script>
    import datepicker from 'vuejs-datepicker'
    import moment from 'moment'
    import * as event from '../../../services/event'
    import {ru} from 'vuejs-datepicker/dist/locale'
    export default {
        name: "Events",
        metaInfo: {
            title: 'Мероприятия',
            meta: [
                { name:'keywords', content: '' },
                { name:'description', content: '' },
            ]
        },
        data() {
            return {
                time: '',
                events: [],
                ru: ru,
                errors: false,
                loading: true,
                disabledDates: {
                    /*
                    customPredictor: function (date) {
                        const weekday = date.getDay()
                        const day = date.getDay()
                        if(weekday === 0 || weekday === 6) {
                            return true
                        }
                    }
                    */
                },
            }
        },
        components: {datepicker},
        methods: {
            customDate(date) {
                var option = moment(date).format('YYYY-MM-DD')
                event.getSelectEvents(option).then(response => {
                    this.events = response.data.data
                }).catch(errors => {
                    this.errors = true
                }).finally(() => {
                    this.loading = false
                })
            }
        },
        mounted() {
            event.getTodayEvents().then(response => {
                this.events = response.data.data         
            }).catch(errors => {
                console.log(errors)
            })
        }
    }
</script>

<style>
.blog {
  transition: all 0.3s ease;
}
.section {
  padding: 100px 0;
  position: relative;
}

@media (max-width: 768px) {
  .section {
    padding: 60px 0;
  }
}
.blog .content h4 {
  line-height: 1.2;
}

.blog .content .title {
  transition: all 0.5s ease;
}

.blog .content .title:hover {
  color: #2f55d4 !important;
}

.blog .content .post-meta .like, .blog .content .post-meta .comments, .blog .content .post-meta .readmore {
  font-size: 15px;
  transition: all 0.5s ease;
}

.blog .content .post-meta .like:hover {
  color: #e43f52 !important;
}

.blog .content .post-meta .comments:hover {
  color: #2eca8b !important;
}

.blog .content .post-meta .readmore:hover {
  color: #2f55d4 !important;
}

.blog .content .link {
  color: #2f55d4 !important;
}
</style>