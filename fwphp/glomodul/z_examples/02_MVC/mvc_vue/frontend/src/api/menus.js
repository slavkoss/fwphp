import { BASE_URL } from '../config/const';
import { fetch } from '../utils/fetch';

export function getMenusAction(query = '') {
  const url = `${BASE_URL}menus/index?${query}`;
  return fetch({
    url: url,
    method: 'get',
  });
};