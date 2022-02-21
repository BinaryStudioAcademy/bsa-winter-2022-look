import { AxiosRequestConfig } from 'axios';

export default interface HttpTransport {
  get<R=any>(url: string, params?: AxiosRequestConfig): Promise<R>;

  post<R=any>(url: string, data?: any, params?: AxiosRequestConfig): Promise<R>;

  patch<R=any>(url: string, data?: any, params?: AxiosRequestConfig): Promise<R>;

  put<R=any>(url: string, data?: any, params?: AxiosRequestConfig): Promise<R>;

  delete(url: string, params?: AxiosRequestConfig): Promise<void>;
}
