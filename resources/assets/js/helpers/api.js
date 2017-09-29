import axios from 'axios'
import Auth from './auth'

export function post(url, data){
    return axios({
        method: 'POST',
        url: url,
        data: data,
        headers: {
            'Authorization': `Bearer ${Auth.state.api_token}`
        }
    })
}