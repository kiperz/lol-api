<?php

namespace LoLApi\Api;

use LoLApi\Result\ApiResult;

/**
 * Class MatchApi
 *
 * @package LoLApi\Api
 * @see     https://developer.riotgames.com/api-methods/
 */
class MatchApi extends BaseApi
{
    const API_URL_MATCHES_BY_MATCHID = '/lol/match/v3/matches/{matchId}';
    const API_URL_MATCHLISTS_BY_ACCOUNTID = '/lol/match/v3/matchlists/by-account/{accountId}';
    const API_URL_MATCHLISTS_BY_ACCOUNTID_RECENT = '/lol/match/v3/matchlists/by-account/{accountId}/recent';
    const API_URL_TIMELINES_BY_MATCHID = '/lol/match/v3/timelines/by-match/{matchId}';

    /**
     * @param int        $matchId
     * @param bool|false $includeTimeline
     *
     * @return ApiResult
     */
    public function getMatchesByMatchId($matchId)
    {
        $url             = str_replace('{matchId}', $matchId, self::API_URL_MATCHES_BY_MATCHID);
        return $this->callApiUrl($url, [], true);
    }
    /**
 * @param int        $matchId
 * @param bool|false $includeTimeline
 *
 * @return ApiResult
 */
    public function getMatchListsByAccountId($accountId, $queue = false, $beginTime = false, $endIndex = false, $season = false, $champion = false, $beginIndex = false, $endTime = false)
    {
        $url             = str_replace('{accountId}', $accountId, self::API_URL_MATCHLISTS_BY_ACCOUNTID);
        $queryParameters = [];
        $queryParameters['beginTime'] = (int) $beginTime;
        $queryParameters['endIndex'] = (int) $endIndex;
        $queryParameters['season'] = (int) $season;
        $queryParameters['champion'] = (int) $champion;
        $queryParameters['beginIndex'] = (int) $beginIndex;
        $queryParameters['queue'] = (int) $queue;
        $queryParameters['endTime'] = (int) $endTime;

        return $this->callApiUrl($url, array_filter($queryParameters), true);
    }

    public function getRecentMatchListsByAccountId($accountId)
    {
        $url             = str_replace('{accountId}', $accountId, self::API_URL_MATCHLISTS_BY_ACCOUNTID_RECENT);
        return $this->callApiUrl($url, [], true);
    }

    public function getTimelinesByMatchId($matchId)
    {
        $url             = str_replace('{matchId}', $matchId, self::API_URL_TIMELINES_BY_MATCHID);
        return $this->callApiUrl($url, [], true);
    }
}
