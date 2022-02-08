import Storage from './storage';
import axios, { AxiosInstance, AxiosRequestConfig } from 'axios';
import HttpTransport from './contracts/HttpTransport';

class AxiosHttpTransport implements HttpTransport {
  axios: AxiosInstance;

  constructor(apiUrl: string, authHeaderName = 'Authorization') {
    this.axios = axios.create({ baseURL: apiUrl });

    this.axios
      .interceptors
      .request
      .use(
        config => {
          if (Storage.hasToken() && config?.headers) {
            config.headers[authHeaderName] = `${Storage.getTokenType()} ${Storage.getToken()}`;
          }

          return config;
        },
        error => Promise.reject(error),
      );

    this.axios
      .interceptors
      .response
      .use(
        response => response.data.data,
        errorResponse => {
          const { response } = errorResponse;

          if (!response) {
            return Promise.reject(new Error('Unexpected error!'));
          }

          const error = response.data.errors[0];

          return Promise.reject(error);
        },
      );
  }

  get<R>(url: string, params: AxiosRequestConfig): Promise<R> {
    return this.axios.get(url, params);
  }

  post<R>(url: string, data?: any, params?: AxiosRequestConfig): Promise<R> {
    return this.axios.post(url, data, params);
  }

  patch<R>(url: string, data?: any, params?: AxiosRequestConfig): Promise<R> {
    return this.axios.patch(url, data, params);
  }

  put<R>(url: string, data?: any, params?: AxiosRequestConfig): Promise<R> {
    return this.axios.patch(url, data, params);
  }

  delete(url: string, params?: AxiosRequestConfig): Promise<void> {
    return this.axios.delete(url, params);
  }
}

export default new AxiosHttpTransport(process.env.VUE_APP_API_URL);
