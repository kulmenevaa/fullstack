import { http } from "./http"

export function getAllNews(page) {
    return http().get('/news?page=' + page);
}
