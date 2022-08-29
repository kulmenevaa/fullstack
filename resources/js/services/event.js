import { http } from "./http"

export function getTodayEvents() {
    return http().get('/events/today');
}

export function getSelectEvents(date) {
    return http().post('/events/select', {date:date})
}